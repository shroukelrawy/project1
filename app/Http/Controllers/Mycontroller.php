<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactClient;
use App\Models\Client;
use Mail;

class MyController extends Controller
{/*
    public function my_data(){
        return view('test');
    }*//*
    public function info(Request $request){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        return view('form1', compact('fname', 'lname'));
    }
    public function myVal(){
        session()->put('test','First Laravel session');
        return 'my session';
    }
    public function restoreVal(){
        
        return 'my session value is '.session('test1');
    }
    public function deleteVal(){
        //session()->forget('test'); //for one session
        session()->flush();   //for all sessions
        return 'session delete';
    }
    public function onceVal(){
        //session()->forget('test'); //for one session
        session()->flash('test1','First Laravel session');   //for all sessions
        return 'session for once';
    }
    public function sendClientMail(){
        $data = Client::findOrFail(1)->toArray();
        $data['theMessage']=' First Message';
        // dd($data);
        Mail::to($data['email'])->send(
            new ContactClient($data)
        );
      return 'mail sent';
    }*/
    
}

    

