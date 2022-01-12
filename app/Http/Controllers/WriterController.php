<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WriterController extends Controller
{
    public function register(Request $request)
    {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $writer = User::create([
            'name' => $validated["name"],
            'email' => $validated["email"],
            'password' => bcrypt($validated["password"])
        ]);

        return response(["writer" =>  $writer , "token" => $writer->createToken('MyApp')->accessToken]);
    }
    public function login(Request $request)
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $writer = User::where('email', $validated["email"])->first();
        if (!$writer || Hash::check($validated['password'], $writer->password)) {
            return response([
                'message' => 'wrong creds'
            ], 401);
        }

        return response(["writer" => $writer, "token" => $writer->createToken('MyApp')->accessToken]);
    }
}
