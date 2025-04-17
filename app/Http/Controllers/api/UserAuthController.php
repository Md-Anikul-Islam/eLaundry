<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Models\User;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{

    public function register(Request $request)
    {
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
                'verification_code' => $verificationCode,
                'is_registration_by' => 'user',

            ]);
            $user->assignRole('User');
            Mail::to($request->email)->send(new VerifyMail($user));
            return response()->json([
                'success' => true,
                'message' => 'Account created, please verify your email.',
            ], 201);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return response()->json([
                    'success' => false,
                    'message' => 'The email has already been taken. Please choose a different email.'
                ], 409);
            }
            return response()->json([
                'success' => false,
                'message' => 'An error occurred. Please try again later.'
            ], 500);
        }
    }

    public function verify(Request $request)
    {

        $this->validate($request, [
            'verification_code' => 'required',
        ]);
        $user = User::where('verification_code', $request->verification_code)->first();
        if ($user) {
            $user->update([
                'status' => 1,
                'verification_code' => null,
            ]);
            $user->email_verified_at = now();
            $user->save();
            return response()->json([
                'message' => 'Your account has been verified. You can now login.',
                'user' => $user,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Invalid verification code.',
            ], 400);
        }
    }


    public function resendVerificationCode(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->status == 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Your email is already verified.'
                ], 400);
            }
            $verificationCode = rand(100000, 999999);
            $user->update([
                'verification_code' => $verificationCode
            ]);
            Mail::to($request->email)->send(new VerifyMail($user));
            return response()->json([
                'success' => true,
                'message' => 'Verification code has been resent to your email.'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'User not found with this email.'
        ], 404);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Could not login. Invalid email or password.',
            ], 401);
        }
        if ($user->email_verified_at === null) {
            return response()->json([
                'message' => 'Please verify your email first.',
            ], 403);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'user' => $user,
        ]);
    }

}
