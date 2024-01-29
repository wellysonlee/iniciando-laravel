<?php 
namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;

interface SeriesRepository
{
    public function add(SeriesFormRequest $request);
}