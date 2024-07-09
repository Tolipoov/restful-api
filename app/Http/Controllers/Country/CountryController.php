<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\Country\CountryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function countries(){
        return response()->json(CountryModel::get(), 200);
    }   
    
    public function countriesById($id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Country not found"], 404);
        }else{
        return response()->json($country, 200);
     }
    }

    public function countrySave(Request $request){
        $rules = [
            'iso' => 'required|min:2|max:2',
            'name' => 'required|min:3|max:255',
            'name_en' => 'required|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        else{
            return response()->json(CountryModel::create($request->all()), 201);
        }
    }

    public function countyEdit(Request $request, $id){
        $rules = [
            'iso' => 'required|min:2|max:2',
            'name' => 'required|min:3|max:255',
            'name_en' => 'required|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        else{
            return response()->json(CountryModel::update($request->all()), 202);
        }
    }

    public function countryDelete($id){
        $country = CountryModel::find($id);
        $country->delete();
        return response()->json($country, 203);
    }
}
