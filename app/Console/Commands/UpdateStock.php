<?php

namespace App\Console\Commands;

use App\Productkey;

use Illuminate\Console\Command;

use Carbon\Carbon;

class UpdateStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update product with pending status if older than 15min';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products = Productkey::where('status', 'pending')->get();

        foreach ($products as $product)
        {
            $startTime = Carbon::parse($product->updated_at);
            $finishTime = Carbon::now();
            $totalDuration = $finishTime->diffInSeconds($startTime);

            if($totalDuration > 900)
            {
                Productkey::where('id', $product->id)
                    ->where('status', '=', 'pending')
                    ->update(['status' => 'sell']);
            }
        }
    }
}
