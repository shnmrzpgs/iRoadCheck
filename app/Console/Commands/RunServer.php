<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class RunServer extends Command
{
    protected $signature = 'run:server';
    protected $description = 'Update .env, run npm build, start Laravel server, and run Pinggy';

    public function handle()
    {
        // ✅ Check if Laravel's built-in server is running
        if ($this->isLaravelServerRunning()) {

        } else {
            $this->error("Please run php artisan serve first...");
            return 1;
        }

        $pinggyUrl = 'https://rwotvmrkoy.a.pinggy.link';
        $pinggyEnvironment = 'production';
        $envPath = base_path('.env');
        $pinggyPath = base_path('pinggy.bat');

        if (!file_exists($pinggyPath)) {
            $this->error("pinggy.bat not found in Laravel root directory.");
            return 1;
        }

        // ✅ Update .env file
        if (file_exists($envPath)) {
            $envContent = File::get($envPath);
            $envContent = preg_replace('/^APP_URL=.*/m', "APP_URL={$pinggyUrl}", $envContent);
            $envContent = preg_replace('/^ASSET_URL=.*/m', "ASSET_URL={$pinggyUrl}", $envContent);
            $envContent = preg_replace('/^APP_ENV=.*/m', "APP_ENV={$pinggyEnvironment}", $envContent);
            File::put($envPath, $envContent);

            $this->info(".env updated: APP_URL and ASSET_URL set to {$pinggyUrl}");
            $this->call('config:clear');
        } else {
            $this->error(".env file not found!");
            return 1;
        }

        // ✅ Start Pinggy in a new terminal window
        $this->info("Starting Pinggy...");
        $pinggyProcess = new Process(['cmd', '/c', 'start', $pinggyPath], base_path());
        $pinggyProcess->disableOutput();
        $pinggyProcess->start();

        return 0;
    }
    private function isLaravelServerRunning()
    {
        exec('netstat -ano | findstr :8000', $output);
        return !empty($output);
    }
}
