<?php

use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    protected $subscriptions = [
        [ 'subscription' => '1 MONTH', 'amount' => 1.00 ],
        [ 'subscription' => '6 MONTH', 'amount' => 600.00 ],
        [ 'subscription' => '12 MONTH', 'amount' => 1200.00 ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->subscriptions as $subscription) {
            DB::table('subscriptions')->insert($subscription);
        }
    }
}
