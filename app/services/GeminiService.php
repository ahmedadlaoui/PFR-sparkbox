<?php

namespace App\Services;

use App\Models\Startup;
use GuzzleHttp\Client;

class GeminiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function getSuggestions(Startup $Startup)
    {
        $prompt = "
    Based on the following startup information:

Name: {$Startup->name}

Description: {$Startup->description}

Details: {$Startup->details}

Category: {$Startup->category}

Valuation: {$Startup->valuation}

Monthly Revenue: {$Startup->monthly_revenue}

Gross Margin: {$Startup->gross_margin}

Burn Rate: {$Startup->burn_rate}

Runway: {$Startup->runway} months

Please analyze and generate professional, insightful 5 short 1  line sentence comments about the startup, including:

Strengths and opportunities based on the data.

Potential risks or challenges (like if the burn rate is high compared to the runway).

How the funding goal and valuation relate to the financial health.

Observations about the category and potential market trends.

Suggestions for improvement if needed.

clear and concise, when generating a response rewrite the numbers i gave you, and don't act as if a human is asking you , respond as if you are an integrated ai in a investment website, your respond will be displayed.
    ";

        try {
            $response = $this->client->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $this->apiKey, [
                'json' => [
                    'contents' => [
                        ['parts' => [['text' => $prompt]]],
                    ],
                ],
                'headers' => ['Content-Type' => 'application/json'],
                'verify' => false,
            ]);

            $data = json_decode($response->getBody(), true);


            return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Pas de suggestion disponible.';
        } catch (\Exception $e) {
            return 'request errors : ' . $e->getMessage();
            // return 'Error generating insights';
        }
    }
}
