<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    //

    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|required|email|max:255',
            'password' => 'required|min:6'
        ]);
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            return redirect('/');
        }
        return redirect('/login')->with('status','error');
    }

    public function test(){
        $this->mosu();
    }
    protected function mosu()
    {
        echo __LINE__ . '<br>';
        echo __FILE__ . '<br>';
        echo __DIR__ . '<br>';
        echo __FUNCTION__ . '<br>';
        echo __CLASS__ . '<br>';
        echo __TRAIT__ . '<br>';
        echo __METHOD__ . '<br>';
        echo __NAMESPACE__ . '<br>';
    }
}
