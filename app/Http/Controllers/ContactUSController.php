<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\ContactUS;
use App\Mail\contactUs;
use Mail;
class ContactUSController extends Controller
{
    public function contactUS()
    {
        return view('emails.contactUs');
    }

    public function contactUSPost(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Prepare data to be sent to the email view
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Send email using the Mailable class
        Mail::to('your-email@example.com')->send(new contactUs($data));

        // Optionally, you can return a response indicating success
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}