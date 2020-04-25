<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(){

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://corona.lmao.ninja/v2/all",
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
    }
    else {

      $data = json_decode($response);

      $ttCases = $data->cases;
      $ttRecovered = $data->recovered;
      $ttDeaths = $data->deaths;
    }


    $curl = curl_init();

    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://corona.lmao.ninja/v2/countries",
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
    }
    else {

      $dataCountries = json_decode($response);
    }

    return view('pages/home', ['cases' => $ttCases, 'recovered' => $ttRecovered, 'deaths' => $ttDeaths], compact('dataCountries'));
  }
}
