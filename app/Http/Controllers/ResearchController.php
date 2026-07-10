<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ResearchController extends Controller
{
    public function index()
    {
        // KUET OpenAlex Institution ID
        $kuetId = 'I1307585291';
        
        // Cache the API response for 24 hours (86400 seconds) to ensure fast loading times
        $researchData = Cache::remember('openalex_kuet_research', 86400, function () use ($kuetId) {
            
            // 1. Fetch recent works/publications from OpenAlex
            $worksResponse = Http::withHeaders([
                'User-Agent' => 'KUET_REPLICA_PORTAL (mailto:admin@kuet.ac.bd)'
            ])->get("https://api.openalex.org/works", [
                'filter' => "institutions.id:{$kuetId}",
                'sort' => 'publication_year:desc',
                'per-page' => 10 // Get the top 10 recent publications
            ]);
            
            // 2. Fetch overall institution stats for total publications
            $institutionResponse = Http::withHeaders([
                'User-Agent' => 'KUET_REPLICA_PORTAL (mailto:admin@kuet.ac.bd)'
            ])->get("https://api.openalex.org/institutions/{$kuetId}");

            $recentWorks = [];
            if ($worksResponse->successful()) {
                $recentWorks = $worksResponse->json()['results'] ?? [];
            }
            
            $totalWorks = 0;
            $totalCitations = 0;
            if ($institutionResponse->successful()) {
                $institutionData = $institutionResponse->json();
                $totalWorks = $institutionData['works_count'] ?? 0;
                $totalCitations = $institutionData['cited_by_count'] ?? 0;
            }

            return [
                'recentWorks' => $recentWorks,
                'totalWorks' => $totalWorks,
                'totalCitations' => $totalCitations
            ];
        });

        return view('research', [
            'recentWorks' => $researchData['recentWorks'],
            'totalWorks' => $researchData['totalWorks'],
            'totalCitations' => $researchData['totalCitations']
        ]);
    }
}
