<?php
namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Http\Request;

class PayPalController extends Controller
{
    public function index()
    {        
        return redirect('index');
    }

    public function payment($total)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success'),
                "cancel_url" => route('paypal.payment/cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "MXN",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect('/index')
                ->with('error', 'Ocurrio un error.');
        } else {
            return redirect('/index')
                ->with('error', $response['message'] ?? 'Ocurrio un error.');
        }
    }

    public function paymentCancel()
    {
        return redirect()
              ->route('paypal')
              ->with('error', $response['message'] ?? 'Haz cancelado la transacción.');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect('/index')
                ->with('success', 'Transacción completada. ¡Gracias por su compra!');
        } else {
            return redirect('/index')
                ->with('error', $response['message'] ?? 'Ocurrio un error.');
        }
    }
}