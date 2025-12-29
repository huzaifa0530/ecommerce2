<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ModelProfile;
use App\Mail\ModelStatusMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class OtpVerificationController extends Controller
{
    /**
     * Show the verify email OTP form.
     */
    public function showForm()
    {
        Log::info('✅ Entered showForm method');
        return view('auth.verify-email');
    }

    /**
     * Verify the OTP entered by the user.
     */
    public function verify(Request $request)
    {
        $enteredOtp = is_array($request->otp) ? implode('', $request->otp) : $request->otp;
        $sessionOtp = session('model_otp');
        $sessionEmail = session('model_email');
        $modelId = session('model_id');

        Log::info('OTP verification attempt', compact('enteredOtp', 'sessionOtp', 'sessionEmail', 'modelId'));


        if ($enteredOtp == $sessionOtp && $sessionEmail && $modelId) {

            $modelProfile = ModelProfile::find($modelId);

            if (!$modelProfile) {
                Log::warning('Model not found for OTP verification', compact('modelId'));
                return back()->withErrors(['otp' => 'Model not found.']);
            }

            // ✅ Mark verified
            $modelProfile->isVerified = true;
            $modelProfile->status = 'new-request';
            $modelProfile->save();

            Log::info('Model verified successfully', [
                'model_id' => $modelProfile->id,
                'email' => $sessionEmail,
                'status' => $modelProfile->status,
            ]);

            // ✅ (Optional) Send mail to admin or model
            if (!empty($sessionEmail)) {
                try {
                    Mail::to($sessionEmail)->send(new ModelStatusMail($modelProfile->name, 'new-request'));
                } catch (\Exception $e) {
                    Log::error('Mail sending failed during verification', ['error' => $e->getMessage()]);
                }
            }

            // ✅ Clear OTP session data
            session()->forget(['model_otp', 'model_email', 'model_id']);

            return redirect()->route('dashboard')->with('success', 'Model verified successfully!');
        }

        Log::warning('OTP mismatch or session expired', compact('enteredOtp', 'sessionOtp', 'sessionEmail'));

        return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
    }


}
