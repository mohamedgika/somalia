<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegisterDetailController extends Controller
{
    public function getCountries(){
       $countries = DB::table('countries')->get();
       return response()->json($countries);
    }

    public function getStates($country_id){
        $states = DB::table('states')->where('country_id',$country_id)->get();
        return response()->json($states);
    }

    public function getCities($state_id){
        $cities = DB::table('cities')->where('state_id',$state_id)->get();
        return response()->json($cities);
    }

}
