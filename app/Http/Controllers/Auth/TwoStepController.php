<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoStepController extends Controller
{
    public function showTwoStepForm()
    {
        return view('auth.two-step');
    }

    public function verifyTwoStep(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);

        // Here, you would typically verify the code from a database or a third-party service.
        // For this example, we'll assume a static code for simplicity.
        $validCode = '123456';

        if ($request->input('code') === $validCode) {
            $user = Auth::user();
            $user->two_step_verified = true;
            $user->save();

            return redirect()->route('home');
        }

        return back()->withErrors(['code' => 'The provided code is incorrect.']);
    }
}