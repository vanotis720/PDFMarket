<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            'user_id' => Auth::id(),
            'file_id' => $file->id,
            'status' => 'pending',
            'amount' => $file->price,
            'payment_reference' => uniqid(),
            'payment_method' => 'lygos',
        ]);

        if ($order) {
            // Here you'll redirect to your payment page
            $amount = intval($file->price * 2850);
            $shop_name = "PDFMarket";
            $order_id = $order->payment_reference;
            $message = "Paiement pour le fichier : " . $file->name;
            $success_url = route('orders.verify', $order_id);
            $failure_url = route('orders.verify', $order_id);

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => env('LYGOS_API_URL') . "gateway",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    "amount" => $amount,
                    "shop_name" => $shop_name,
                    "order_id" => $order_id,
                    "message" => $message,
                    "success_url" => $success_url,
                    "failure_url" => $failure_url,
                ]),
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "api-key: " . env('LYGOS_API_KEY'),
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                Log::error("cURL Error #:" . $err);
                return redirect()->route('orders.create', $file)->with('error', 'Une erreur est survenue lors de la création de la commande.');
            } else {
                $responseData = json_decode($response, true);

                return redirect()->away($responseData['link']);
            }
        }


        // return view('orders.payment', compact('order', 'file'));
    }

    public function verifyPaiement($payment_reference)
    {
        $order = Order::where('payment_reference', $payment_reference)->first();

        if (!$order) {
            return redirect()->route('home')->with('error', 'Commande non trouvée.');
        }


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => env('LYGOS_API_URL') . "gateway/payin/" . $payment_reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "api-key: " . env('LYGOS_API_KEY')
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            Log::error("cURL Error #:" . $err);
            return redirect()->route('orders.create', $order->file)->with('error', 'Une erreur est survenue lors de la vérification du paiement.');
        } else {
            $responseData = json_decode($response, true);

            if ($responseData['status'] == 'success') {
                $order->update(['status' => 'completed']);
                return redirect()->route('files.show', $order->file_id)->with('success', 'Paiement réussi ! Votre commande est maintenant complète.');
            } else {
                return redirect()->route('orders.create', $order->file)->with('error', 'Le paiement a échoué. Veuillez réessayer.');
            }
        }
    }
}
