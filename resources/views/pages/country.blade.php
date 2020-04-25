@extends('app')

@section('title', 'Country')

@push('style')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endpush

@section('attribute', 'countryPage')

@section('content')
<section class="wrap">
    <div class="country">
        <div class="div1 countryDesc itemsCountry">
            <div class="titleContainer">
                <h2>{{$name}}</h2>
            </div>
            <div>
                <img src="{{$flag}}" alt="Flag">
            </div>
            <div>
                <p><span>ISO : </span><span class="js-iso">{{$iso}}</span></p>
                <p><span>Region : </span>{{$region}}</p>
                <p><span>Capital : </span>{{$capital}}</p>
                <p><span>Population : </span>{{number_format($pop,0,',', ' ')}}</p>
            </div>
        </div>
        <div class="div2 itemsCountry">
            <div class="titleContainer">
                <h2>Daily statistics</h2>
            </div>
            <span class="js-messageError messageError"></span>
            <canvas class="js-dailyStatsCountry" width="300" height="200"></canvas>
        </div>
    </div>
    <div class="itemsCountry">
        <div class="titleContainer">
            <h2>Historical</h2>
        </div>
        <span class="js-messageError messageError"></span>
        <canvas class="js-countryStatsContainer" width="400" height="200"></canvas>
    </div>

</section>
@endsection

@push('script')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
