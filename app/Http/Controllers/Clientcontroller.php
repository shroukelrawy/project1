<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class Clientcontroller extends Controller
{
    private $columns = ['clientName','phone', 'email','website'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=Client::get();
        return view('clients',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addclient');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // $client = new Client() ;
    // $client->clientName =$request->clientName;
    // $client->phone = $request->phone;
    // $client->email=$request->email;
    // $client->website =$request->website;
    // $client->save ();
    
    $data = $request->validate([
    'clientName' => 'required|string|max:100|min:5',
    'phone' => 'required|string|min:11|unique:users,phone',  
    'email' => 'required|email:rfc|unique:users,email', 
    'website' => 'required|url',
     ]);

    // $data=$request->validate([
    //     'clientName'=>'required',
    //     'phone'=>'string',
    //     'email'=>'string',
    //     'website'=>'string',
    // ]);

    Client::create($data);
    return redirect('clients');
  
    // return 'inserted Successfully';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return view('showclient',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('editclient',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'clientName' => 'required|string|max:100|min:5',
            'phone' => 'required|string|min:11|unique:clients,phone,' . $id,  
            'email' => 'required|email:rfc|unique:clients,email,' . $id, 
            'website' => 'required|url',
        ]);
        Client::where('id', $id)->update($data);
        // Client::where('id', $id)->update($request->only($this->columns));
        return redirect('clients');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        Client::where('id', $id)->delete();
        return redirect('clients');

    }
    public function force(Request $request)
    {
        $id=$request->id;
        Client::where('id', $id)->forceDelete();
        return redirect('clients');

    }
    public function trash()
    {
        $trashed=Client::onlyTrashed()->get();
        return view('trashclient', compact('trashed'));  

    } 
    public function restore(string $id)
    {
        Client::where('id', $id)->restore();
        return redirect('clients');

    }   
}
