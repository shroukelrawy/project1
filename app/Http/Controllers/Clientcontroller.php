<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class Clientcontroller extends Controller
{
    private $columns = ['clientName','phone', 'email','website','city','active','image'];
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
    // $message=[
    //     'clientName.required'=>'The Client name is missed,please insert',
    //     'clientName.min'=>'Length less than 5,please insert more char',       
    //     'clientName.max'=>'Length less than 100,please insert less char'

    // ];

    $message=$this->errMsg();
    $data = $request->validate([
    'clientName' => 'required|string|max:100|min:5',
    'phone' => 'required|string|min:11', 
    'email' => 'required|email:rfc', 
    'website' => 'required',
    'city' => 'required|max:30',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

     ],$message);

    // $data=$request->validate([
    //     'clientName'=>'required',
    //     'phone'=>'string',
    //     'email'=>'string',
    //     'website'=>'string',
    // ]);

    if ($request->hasFile('image')) {
        $fileName = $request->file('image')->store('assets/images', 'public');
        $data['image'] = $fileName;
    }
    // $imgExt=$request->image->getClientOriginalExtension();
    // $fileName=time() . '.' . $imgExt;
    // $path='assets/images';
    // $request->image->move($path, $fileName);
    // $data['image'] = $path . '/' . $fileName;

    $data['active']=isset($request->active);

    Client::create($data);
    return redirect('clients');

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
        $message=$this->errMsg();

        $data = $request->validate([
            'clientName' => 'required|string|max:100|min:5',
            'phone' => 'required|string|min:11',
            'email' => 'required|email:rfc',
            'website' => 'required',
            'city' => 'required|max:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ],$message);

        // Client::where('id', $id)->update($data);
        // // Client::where('id', $id)->update($request->only($this->columns));
        // return redirect('clients');


        $client = Client::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($client->image && Storage::exists('public/' . $client->image)) {
                Storage::delete('public/' . $client->image);
            }

            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path;
        }

        $data['active'] = isset($request->active);

        $client->update($data);

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
    public function errMsg()
    {
       return [
            'clientName.required'=>'The Client name is missed,please insert',
            'clientName.min'=>'Length less than 5,please insert more char',       
            'clientName.max'=>'Length less than 100,please insert less char'
    
        ];

    } 
      
}
