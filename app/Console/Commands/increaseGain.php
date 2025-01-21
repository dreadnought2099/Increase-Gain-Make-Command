<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Investment;

class increaseGain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'increase:gain';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increase investments gain.';

    /**
     * Execute the console command.
     */

        public function handle()
        {
            $investment = Investment::all();
            foreach ($investment as $inv) {
                if ($inv->type == 'bronze') {
                    $inv->gain = $inv->amount * 0.05;
                } elseif ($inv->type == 'silver') {
                    $inv->gain = $inv->amount * 0.07;
                } elseif ($inv->type == 'gold') {
                    $inv->gain = $inv->amount * 0.10;
                }
                $inv->save();
            }
            return 0;

        }

}
