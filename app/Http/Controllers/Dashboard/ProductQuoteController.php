<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class ProductQuoteController extends Controller
{
    public function show($id)
    {
        // Eager load relations you have in model
        $product = Product::with(['images', 'colors', 'category'])->findOrFail($id);

        return view('dashboard.pages.products.quote', compact('product'));
    }
    public function submit(Request $request, $id)
    {
        $product = Product::with(['images', 'colors'])->findOrFail($id);

        $data = $request->validate([
            'quantity' => 'nullable|string',
            'zip' => 'nullable|string',
            'company' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'asi' => 'nullable|string',
            'in_hand_date' => 'nullable|string',
            'need_freight' => 'nullable|string',
            'loading_dock' => 'nullable|string',
            'message' => 'nullable|string',
            'attachments.*' => 'nullable|file|max:10240', // <--- handle array of files
        ]);

        // Store all attachments
        $storedAttachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $storedAttachments[] = $file->store('quotes', 'public');
            }
        }
        $data['attachments'] = $storedAttachments;

        try {
            $requestType = $request->input('request_type'); // "Request Mockup" or "Quotation"
            $data['request_type'] = $requestType;
            $data['colors'] = $request->input('colors', []); // <-- defaults to empty array

            // Example: Change email subject dynamically
            $subject = $requestType . ' - ' . $product->name;


            Mail::to('mhuzaifa05302@gmail.com')->send(new \App\Mail\ProductQuoteMail($product, $data, $subject));

            \Log::info('Product quote email sent successfully for product ID: ' . $product->id);

            return back()->with('success', 'Quote request sent successfully!');

        } catch (\Exception $e) {
            \Log::error('Product quote email failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send quote request. Check logs for details.');
        }
    }

}
