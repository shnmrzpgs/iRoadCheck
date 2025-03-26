<?php

namespace App\Console\Commands;

use App\Models\Suggestion;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MarkExpiredSuggestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'suggestions:mark-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark suggestions as matched if they are older than 5 days without response';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredSuggestions = Suggestion::where('is_match', false)
            ->where('response_deadline', '<', Carbon::now())
            ->get();

        foreach ($expiredSuggestions as $suggestion) {
            $suggestion->update([
                'is_match' => true,
            ]);
        }

        $this->info(count($expiredSuggestions) . ' suggestions marked as matched.');
    }
}
