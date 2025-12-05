<?php

namespace App\Services;

use GuzzleHttp\Client;

class GeminiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://generativelanguage.googleapis.com/v1beta/',
            'timeout'  => 30,
        ]);
    }

    public function ask($prompt)
    {
        $response = $this->client->post(
            'models/gemini-1.5-flash:generateContent?key=' . env('GEMINI_API_KEY'),
            [
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]
            ]
        );

        $json = json_decode($response->getBody(), true);

        return $json['candidates'][0]['content']['parts'][0]['text']
            ?? "No tengo información para responder eso.";
    }
}
