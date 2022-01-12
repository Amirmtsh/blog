<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $writer = User::create([
            'name' => $validated["name"],
            'email' => $validated["email"],
            'password' => $validated["password"]
        ]);
        return $writer;
    }
}
