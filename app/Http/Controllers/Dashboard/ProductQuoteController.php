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
        'attachment1' => 'nullable|file|max:10240',
        'attachment2' => 'nullable|file|max:10240',
    ]);

    // Save attachments
    if ($request->hasFile('attachment1')) {
        $data['attachment1'] = $request->file('attachment1')->store('quotes', 'public');
    }

    if ($request->hasFile('attachment2')) {
        $data['attachment2'] = $request->file('attachment2')->store('quotes', 'public');
    }

    try {
        Mail::to('mhuzaifa05302@gmail.com')->send(new \App\Mail\ProductQuoteMail($product, $data));

        // Log success
        \Log::info('Product quote email sent successfully for product ID: ' . $product->id);

        // Send console log to browser
        echo "<script>console.log('Email sent successfully for product ID: {$product->id}');</script>";

        return back()->with('success', 'Quote request sent successfully!');

    } catch (\Exception $e) {
        // Log the full exception
        \Log::error('Product quote email failed: ' . $e->getMessage());

        // Print error to browser console
        echo "<script>console.error('Email sending failed: " . addslashes($e->getMessage()) . "');</script>";

        return back()->with('error', 'Failed to send quote request. Check logs for details.');
    }
}

}
