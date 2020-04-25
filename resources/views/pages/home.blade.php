@extends('app')

@section('title', 'Home')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('attribute', 'homePage')

@section('content')
  <section class="wrap">
    <div class="globalStats">
      <div class="div1 items">
        <div class="titleContainer">
          <h2>Cases</h2>
          <p>Total cases detected</p>
        </div>
        <div>
          <span>{{number_format($cases ?? '',0,',', ' ')}}</span>
        </div>
      </div>
      <div class="div2 items">
        <div class="titleContainer">
          <h2>Recovered</h2>
          <p>Total person cared for</p>
        </div>
        <div>
          <span>{{number_format($recovered,0,',', ' ')}}</span>
        </div>
      </div>
      <div class="div3 items">
        <div class="titleContainer">
          <h2>Deaths</h2>
          <p>Total rescinded deaths</p>
        </div>
        <div>
          <span>{{number_format($deaths,0,',', ' ')}}</span>
        </div>
      </div>
    </div>
    <div class="globalCurves items">
        <div class="titleContainer">
            <h2>Global curves</h2>
        </div>
        <div class="curves">
            <canvas class="js-countryStatsContainer"></canvas>
        </div>
    </div>
    <div class="countriesStats items">
      <div class="titleContainer">
        <h2>Overall statistics by country</h2>
      </div>
      <div class="countriesStat">
        <div class="countriesStat_content">
          <div class="countriesStat_categories">
            <span>Country</span>
            <span>Confirmed</span>
            <span>Recovered</span>
            <span>Deaths</span>
          </div>
          <div class="countriesStat_data">
            @foreach($dataCountries as $dataCountry)
              <div>
                <a href="country/{{$dataCountry->countryInfo->iso3}}">{{$dataCountry->country}}</a>
                <span>{{number_format($dataCountry->cases,0,',', ' ')}}</span>
                <span>{{number_format($dataCountry->recovered,0,',', ' ')}}</span>
                <span>{{number_format($dataCountry->deaths,0,',', ' ')}}</span>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
