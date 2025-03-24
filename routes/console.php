<?php

use App\Console\Commands\MarkExpiredSuggestions;
use App\Models\Suggestion;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('suggestions:mark-expired', function () {
    $this->call(MarkExpiredSuggestions::class);
})->purpose('Mark suggestions as matched if no response after 5 days')->daily();
