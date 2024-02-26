<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class UpdateOrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-order-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        Permission::create(['name' => 'edit articles']);
        $orders = Order::query()->whereDate('created_at' ,'<',now())->where('status','pending')->update(['status' =>'expired']);
        $this->info('Order statuses updated successfully.');

    }
}
