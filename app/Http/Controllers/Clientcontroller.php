<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Client;
class Clientcontroller extends Controller
{
    private $columns =['clientname',
    'phone',
    'email',
    'website'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients= Client::get();
        return view('clients',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    /*
    public function store(Request $request)
    {
        //
        /*
        $client= new Client();
        $client->clientname =$request->input('name');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');
        $client->website = $request->input('website');
        $client->save();*/
        //return dd($request->all());
        
        /*

        $data = $request->validate($this->validationRules(), $this->errorMessages());
        $data['active'] = $request->has('active') ? 1 : 0;
        $imgExt=$request->image->getClientOriginalExtension();
        $fileName=time() . '.' . $imgExt;
        $path='assets/images';
        $request->image->move($path, $fileName);
        $data['image']=$fileName;
        Client::create($data);
        return redirect('clients');
    }
    */
    public function store(Request $request)
{
    // Validate the incoming request data with defined rules and error messages
    $data = $request->validate($this->validationRules(), $this->errorMessages());

    // Set the 'active' attribute based on whether the 'active' checkbox is present in the request
    $data['active'] = $request->has('active') ? 1 : 0;

    // Process image if provided
    if ($request->hasFile('image')) {
        $imgExt = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $path = 'assets/images';
        $request->image->move(public_path($path), $fileName);
        $data['image'] = $fileName;
    } else {
        // Set the image field to a default image if no image is uploaded
        $data['image'] = 'Unknown.png'; // Only the filename, as the path is already known
    }

    // Create a new client record with the validated data
    Client::create($data);

    // Redirect to the clients index page with a success message
    return redirect('clients')->with('success', 'Client created successfully.');
}

    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $client = Client::find($id);

    // Return the edit view with the client data
         return view('showClient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
        // Fetch the client with the given ID
         $client = Client::find($id);

    // Return the edit view with the client data
         return view('editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    /*
    public function update(Request $request, string $id)
    {
        //
        $client = Client::find($id);
        $data = $request->validate([
            'clientname' => 'required|min:3|max:100',
            'phone' => 'required|max:13',
            'email'=>'required|email:rfc',
            'website'=>'required'
        ]);
    
        if (!$client) {
        // Handle case where client with given ID is not found
        // For example, redirect back with an error message
              return redirect()->back()->with('error', 'Client not found.');
        }
         
         // Update client attributes
        $client->update($request->only($this->data));

        // Redirect to clients index page or any other desired destination
        return redirect('clients')->with('success', 'Client updated successfully.');

    }*/
    public function update(Request $request, string $id)
{
    // Validate the incoming request data with defined rules and error messages
    $data = $request->validate($this->validationRules(), $this->errorMessages());

    // Set the 'active' attribute based on whether the 'active' checkbox is present in the request
    $data['active'] = $request->has('active') ? 1 : 0;

    // Find the client by ID
    $client = Client::find($id);

    // Check if the client exists
    if (!$client) {
        return redirect()->back()->with('error', 'Client not found.');
    }

    // Check if a new image is being uploaded
    if ($request->hasFile('image')) {
        $imgExt = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $path = 'assets/images';
        $request->image->move($path, $fileName);
        $data['image'] = $fileName;
    } else {
        // Remove 'image' from data if no new image is uploaded to prevent overwriting with null
        unset($data['image']);
    }

    // Update the client attributes
    $client->update($data);

    // Redirect to clients index page with success message
    return redirect('clients')->with('success', 'Client updated successfully.');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
{
    // Find the client by ID
    $id=$request->id;
    $client = Client::find($id);

    // If client with given ID is not found, handle the case
    if (!$client) {
        return redirect()->back()->with('error', 'Client not found.');
    }

    // Delete the client
    $client->delete();

    // Redirect to clients index page with success message
    return redirect('clients')->with('success', 'Client deleted successfully.');
}
public function trash()
{
    // Find the client by ID
    
    $trashed = Client::onlyTrashed()->get();

    

    // Redirect to clients index page with success message
    return view('trashClient',compact('trashed'));
}
public function restore(string $id){
    Client::where('id',$id)->restore();
    return redirect('clients');
}
public function force(Request $request)
{
    // Find the student by ID
    $id = $request->id;

    // Permanently delete the student using query builder
    DB::table('students')->where('id', $id)->delete();

    // Redirect to trash students page with success message
    return redirect('trashStudent')->with('success', 'Student deleted permanently.');
}
private function validationRules()
{
    return [
        'clientname' => 'required|min:3|max:100',
        'phone' => 'required|max:13|min:11',
        'email' => 'required|email:rfc|unique:clients,email',
        'website' => 'required|url:http,https',
        'image' => 'sometimes|nullable|image',
        'city' => 'required'
    ];
}


private function errorMessages()
{
    return [
        'clientname.required' => 'The client name is required.',
        'clientname.min' => 'The client name must be at least 3 characters.',
        'clientname.max' => 'The client name may not be greater than 100 characters.',
        'phone.required' => 'The phone number is required.',
        'phone.max' => 'The phone number may not be greater than 13 characters.',
        'phone.min' => 'The phone number must be at least 11 characters.',
        'email.required' => 'The email address is required.',
        'email.email' => 'The email address must be a valid email.',
        'email.unique' => 'The email address has already been taken.',
        'website.required' => 'The website is required.',
        'website.url' => 'The website must be a valid URL',
        'city.required' => 'The city is required.',
        
    ];
}

}