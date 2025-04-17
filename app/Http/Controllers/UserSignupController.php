<?php

namespace App\Http\Controllers;

use App\Mail\VerifyMail;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yoeunes\Toastr\Facades\Toastr;

class UserSignupController extends Controller
{
    public function showSignupForm()
    {
        return view('frontend.pages.userSignup');
    }

    public function signupStore(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'business_type' => 'required',
            'age' => 'required',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $verificationCode = rand(100000, 999999);
        try {
            $user = User::create([

                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'name' => $input['first_name'] . ' ' . $input['last_name'],
                'business_type' => $input['business_type'],
                'age' => $input['age'],
                'is_receive_promotional_notification' => $input['is_receive_promotional_notification'] ?? 0,
                'is_receive_account_notification' => $input['is_receive_account_notification'] ?? 0,
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => $input['password'],
                'verification_code' => null,
                'email_verified_at' => now(),
                'is_registration_by' => 'User',

            ]);
            $user->assignRole('User');
            //Mail::to($request->email)->send(new VerifyMail($user));
            Toastr::success('User Register Successfully', 'Success');
            return redirect()->route('dashboard')->with('success', 'Account created, please verify your email.');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                Toastr::error('The email has already been taken. Please choose a different email.', 'Error');
                return redirect()->back();
            }
            Toastr::error('An error occurred: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function userHome()
    {
        return view('frontend.pages.userHome');
    }
}
