@extends('app')

@section('title', 'Help')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@push('style')

@endpush

@section('attribute', 'infectedPage')

@section('content')
    <section class="wrap">
        <div class="item">
            <form action="{{route('Infected-insert')}}" method="POST">
                @csrf
                <span>Census form </span>
                <div>
                    <input type="text" class="inputInfectedForm"name="firstName" placeholder="First name" required="">
                    <input type="text" class="inputInfectedForm" name="lastName" placeholder="Last name" required="">
                    <input type="date" class="inputInfectedForm" name="birthday" required="">
                </div>
                <div class="radioGroup">
                    <div class="inputGroup">
                        <input id="radio1" name="gender" value="male" type="radio" required=""/>
                        <label for="radio1">Male</label>
                    </div>
                    <div class="inputGroup">
                        <input id="radio2" name="gender" value="female" type="radio" required=""/>
                        <label for="radio2">Female</label>
                    </div>
                    <div class="inputGroup">
                        <input id="radio3" name="gender" value="other" type="radio" required=""/>
                        <label for="radio3">Other</label>
                    </div>
                </div>
                <div>
                    <input type="tel" class="inputInfectedForm" name="phone" placeholder="Phone" required="">
                    <input type="email" class="inputInfectedForm" name="email" placeholder="Email" required="">
                </div>
                <div>
                    <input type="text" class="inputInfectedForm" name="country" placeholder="Country" required="">
                    <input type="text" class="inputInfectedForm" name="address" placeholder="Home address" required="">
                </div>
                <button>Send</button>
            </form>
        </div>
    </section>
@endsection
