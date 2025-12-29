<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    // Show form or contact page
    public function index()
    {

        $contacts = Contact::paginate(10);
        return view('dashboard.pages.contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('frontend.contact');
    }

    // Store contact data

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        $data = $request->only('first_name', 'last_name', 'email', 'phone', 'message');

        // Send email
        Mail::to('mhuzaifa05302@gmail.com')->send(new ContactFormMail($data));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


    // Optional: show all messages in admin
    public function showAll()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('dashboard.pages.contact.index', compact('contacts'));
    }
}
