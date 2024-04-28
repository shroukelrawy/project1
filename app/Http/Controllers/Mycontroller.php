<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    public function my_data(){
        return view('test');
    }




    public function receiveForm1(Request $request)
    {
        $firstName = $request->input('fname');
        $lastName = $request->input('lname');
        
      return redirect()->route('page2')->with(['firstName' => $firstName, 'lastName' => $lastName]);
        
    }

}
