<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(File $file)
    {
        return view('orders.create', compact('file'));
    }

    public function store(Request $request, File $file)
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'file_id' => $file->id,
            'status' => 'pending',
            'amount' => $file->price,
        ]);

        // Here you'll redirect to your payment page
        return view('orders.payment', compact('order', 'file'));
    }
}
