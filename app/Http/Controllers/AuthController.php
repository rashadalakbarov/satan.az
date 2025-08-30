<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\PhoneOtp;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('client.login');
    }

    public function sendOtp(Request $request) {
        $request->validate([
            'phone' => [
                'required',
                'regex:/^\+994(50|51|55|70|77|99)\s\d{3}\s\d{2}\s\d{2}$/'
            ],
        ], [
            'phone.required' => 'Telefon nömrəsi boş buraxılmamalıdır.',
            'phone.regex' => 'Telefon nömrəsi "+994XX XXX XX XX" formatında olmalıdır.',
        ]);

        $phoneotp = PhoneOtp::where('phone', $request->phone)->first();

        if (!$phoneotp) {
            $phoneotp = new PhoneOtp();
            $phoneotp->phone = $request->phone;
        }
        
        $otp = rand(100000, 999999); // 6 haneli OTP
        $phoneotp->otp = $otp;
        $phoneotp->otp_expires_at = now()->addMinutes(5);
        $phoneotp->save();

        // Burada SMS gönderimi yapılır (örneğin: Twilio, NetGSM, Infobip, Melipayamak vs.)
        // Sadece örnek:
        logger("OTP kodu: $otp");

        // return view('client.verify-otp',  [
        //     'phone' => $phoneotp->phone,
        //     'otp' => $phoneotp->otp
        // ]);

        return redirect()->route('verify-otp.form', ['phone' => $phoneotp->phone]);
    }

    public function verifyOtpForm(Request $request)
    {
        return view('client.verify-otp', [
            'phone' => $request->phone
        ]);
    }

    public function verifyOtp(Request $request) {
        $request->validate([
            'phone' => 'required',
            'otp' => 'required',
        ], [
            'otp.required' => 'OTP kod boş buraxılmamalıdır.',
            'phone.required' => 'Telefon nömrəsi boş buraxılmamalıdır.',
        ]);

        $phoneotp = PhoneOtp::where('phone', $request->phone)
                    ->where('otp', $request->otp)
                    ->where('otp_expires_at', '>', now())
                    ->first();

        // if (!$phoneotp) {
        //     return redirect()->route('verify-otp')->withErrors(['phone' => 'OTP kod keçərsizdir ya da vaxtı bitmişdir.']);
        // }

        if (!$phoneotp) {
            // Hata mesajını OTP alanına bağlayalım
            return redirect()->route('verify-otp')->withErrors([
                'otp' => 'OTP kod keçərsizdir ya da vaxtı bitmişdir.'
            ])->withInput();
        }

        if ($phoneotp && $phoneotp->otp === $request->otp) {
            $user = User::where('phone', $phoneotp->phone)->first();

            if ($user) {
                // Giriş yap
                Auth::guard('phone')->login($user);
                
                // OTP sıfırla
                $phoneotp->otp = null;
                $phoneotp->otp_expires_at = null;
                $phoneotp->save();

                return redirect()->route('profile.index');
            } else {
                $user = User::create([
                    'phone' => $phoneotp->phone,
                    'name' => '',
                    'email' => '',
                ]);

                // Giriş yap
                Auth::guard('phone')->login($user);
                
                // OTP sıfırla
                $phoneotp->otp = null;
                $phoneotp->otp_expires_at = null;
                $phoneotp->save();

                return redirect()->route('profile.index'); // veya istediğin sayfa
            }
        }
    }
}
