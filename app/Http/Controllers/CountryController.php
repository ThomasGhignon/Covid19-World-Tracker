<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function link(){
        $linkISO = request('iso');
        $dataCountry = CountryController::api("https://restcountries.eu/rest/v2/alpha/".$linkISO);

        $countryPop = $dataCountry->population;
        $countryName = $dataCountry->name;
        $countryFlag = $dataCountry->flag;
        $countryIso = $dataCountry->alpha3Code;
        $countryRegion = $dataCountry->region;
        $countryCapital = $dataCountry->capital;

        return view('pages/country', ['name'=>$countryName ,'pop' =>$countryPop,'flag' =>$countryFlag,'iso' =>$countryIso,'region' =>$countryRegion,'capital' =>$countryCapital]);
    }

    public function search(Request $request){
        $searchName = $request->input('searchCountry');
        $dataCountry = CountryController::api("http://restcountries.eu/rest/v2/name/".$searchName);

        $countryPop = $dataCountry[0]->population;
        $countryName = $dataCountry[0]->name;
        $countryFlag = $dataCountry[0]->flag;
        $countryIso = $dataCountry[0]->alpha3Code;
        $countryRegion = $dataCountry[0]->region;
        $countryCapital = $dataCountry[0]->capital;

        return view('pages/country', ['name'=>$countryName ,'pop' =>$countryPop,'flag' =>$countryFlag,'iso' =>$countryIso,'region' =>$countryRegion,'capital' =>$countryCapital]);
    }

    private function api($request){
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_COOKIE => "__cfduid=d97c482f7184599150da6e17b1ca4a4d51583928961",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }
}
