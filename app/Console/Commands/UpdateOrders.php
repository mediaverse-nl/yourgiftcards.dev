<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Order;
use Carbon\Carbon;

class UpdateOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'updating orders status';

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
        $orders = Order::where('status', 'pending')->get();

        foreach ($orders as $order)
        {
            $startTime = Carbon::parse($order->updated_at);
            $finishTime = Carbon::now();
            $totalDuration = $finishTime->diffInSeconds($startTime);

            if($totalDuration > 870)
            {
                Order::where('id', $order->id)
                    ->where('status', '=', 'pending')
                    ->update(['status' => 'expired']);
            }
        }
    }
}
