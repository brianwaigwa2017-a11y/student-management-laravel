<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MpesaService
{
    public function getAccessToken(): string
    {
        $baseUrl = config('mpesa.base_url');

        $response = Http::withBasicAuth(config('mpesa.consumer_key'), config('mpesa.consumer_secret'))
            ->get($baseUrl . '/oauth/v1/generate', [
                'grant_type' => 'client_credentials',
            ]);

        $response->throw();

        return $response->json('access_token');
    }

    public function stkPush(string $phone,  float $amount, string $reference): array
    {
        $timestamp = now()->format('YmdHis');

        $password = base64_encode(config('mpesa.shortcode') . config('mpesa.passkey') . $timestamp);

        $token = $this->getAccessToken();

        $response = Http::withToken($token)
            ->acceptJson()
            ->post(
                config('mpesa.base_url')
                    . '/mpesa/stkpush/v1/processrequest',
                [
                    'BusinessShortCode' => config('mpesa.shortcode'),

                    'Password' => $password,

                    'Timestamp' => $timestamp,

                    'TransactionType' => 'CustomerPayBillOnline',

                    'Amount' => $amount,

                    'PartyA' => $phone,

                    'PartyB' => config('mpesa.shortcode'),

                    'PhoneNumber' => $phone,

                    'CallBackURL' => config('mpesa.callback_url'),

                    'AccountReference' => $reference,

                    'TransactionDesc' => 'Student payment',
                ]
            );

        $response->throw();

        return $response->json();
    }
}