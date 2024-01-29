<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request)
    {
        return DB::transaction (function () use ($request) {
            $serie = Serie::create($request->all());
            $season = [];
            for ($i = 1; $i <= $request->seasonsQty; $i ++){
                $season[] = [
                    'series_id' => $serie->id,
                    'number'=>$i,
                ];
            }
    
            Season::insert($season);
    
            foreach ($serie->season  as $season) {
                for ($j = 1; $j <= $request->episodesPerSeason; $j ++){
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
                }
            }
            Episode::insert($episodes);
    
            return $serie;
        });
    }

}