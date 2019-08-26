<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCities(Request $request)
    {
        $cities = City::where('department', $request->id)->get();
        return json_encode($cities);
    }

}
