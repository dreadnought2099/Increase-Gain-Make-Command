<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Investment;

class GainType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gain:type {type} {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add the given amount to gain';

    public function handle()
    {
        $amount = $this->argument('amount');
        $type = $this->argument('type');

        $accounts = Investment::where('type', $type)->get();


        foreach ($accounts as $account) {
            $account->gain += $amount;
            $account->save();
        }

        $this->info("Successfully added $amount to the gain of all accounts with type '$type'.");
        return Command::SUCCESS;
    }
}
