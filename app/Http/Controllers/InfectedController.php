<?php

namespace App\Http\Controllers;

use App\Infected;
use Illuminate\Http\Request;

class InfectedController extends Controller
{
    public function index(){
        return view('pages/infected');
    }

    public function insert(Request $request){
        $infected = new Infected;
        $infected-> firstName = $request->input('firstName');
        $infected-> lastName = $request->input('lastName');
        $infected-> birthday = $request->input('birthday');
        $infected-> gender = $request->input('gender');
        $infected-> phone = $request->input('phone');
        $infected-> email = $request->input('email');
        $infected-> country = $request->input('country');
        $infected-> address = $request->input('address');

        $infected->save();

        return redirect('/');
    }
}
