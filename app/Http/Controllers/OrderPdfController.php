<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class OrderPdfController extends Controller
{
    /**
     * Generate a PDF for the order
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function generate(Order $order)
    {
        // Check if user has permission to view this order
        $this->authorize('view', $order);

        $pdf = PDF::loadView('pdf.order', compact('order'));

        return $pdf->download('order-' . $order->id . '.pdf');
    }

    /**
     * Show a preview of the PDF in the browser
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function preview(Order $order)
    {
        // Check if user has permission to view this order
        $this->authorize('view', $order);

        return view('pdf.order', compact('order'));
    }
}
