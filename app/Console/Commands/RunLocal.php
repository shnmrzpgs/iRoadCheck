<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class RunLocal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:local';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set APP_URL and ASSET_URL to localhost and APP_ENV to local';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $localUrl = 'localhost'; // Localhost URL
        $envPath = base_path('.env');

        if (!file_exists($envPath)) {
            $this->error(".env file not found!");
            return 1; // Exit with error
        }

        // ✅ Read the .env file
        $envContent = File::get($envPath);

        // ✅ Update APP_URL, ASSET_URL, and APP_ENV
        $envContent = preg_replace('/^APP_URL=.*/m', "APP_URL={$localUrl}", $envContent);
        $envContent = preg_replace('/^ASSET_URL=.*/m', "ASSET_URL=", $envContent);
        $envContent = preg_replace('/^APP_ENV=.*/m', "APP_ENV=local", $envContent);

        // ✅ Write the changes
        File::put($envPath, $envContent);
        $this->info(".env updated: APP_URL, ASSET_URL set to {$localUrl}, and APP_ENV set to local.");

        // ✅ Clear configuration cache
        $this->call('config:clear');

        return 0; // Success
    }
}
