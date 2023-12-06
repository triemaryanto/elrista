<?php

namespace App\Services\Midtrans;

use App\Models\Cart;
use App\Models\Order;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $order = Order::find($this->order);

        $data[] = [
            'id' => 1,
            'price' => $order->pilih_service,
            'quantity' => 1,
            'name' => 'Pengiriman Lewat ' . $order->courier,
        ];

        foreach ($order->detail_order as $val) {
            $data[] = [
                'id' => $val->product_id,
                'price' => $val->price,
                'quantity' => $val->qty,
                'name' => $val->product->name,
            ];
        }

        $params = [
            'transaction_details' => [
                'order_id' => $order->number,
                'gross_amount' => $order->total_price,
            ],
            'item_details' => $data,
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,
                'phone' => $order->user->wa,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
