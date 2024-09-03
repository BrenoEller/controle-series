<?php

namespace App\Repository;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Series;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class SeriesRepository 
{
    public function add(SeriesFormRequest $request)
    {
        return DB::transaction(function() use($request) {
            $serie = Series::create($request->all());
            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i
                ]; 
            }

            Season::insert($seasons);
            $episodes = [];
            foreach ($serie->seasons as $season){
                for ($j = 1; $j <= $request->episodesQty; $j++) {
                    
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j,
                    ];
                }
            };

            Episode::insert($episodes);
        });
    }
}