<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line

class UserController extends Controller
{
    public function show()
    {
        $users = User::paginate(15);

        return view('users', [
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        $validar = Validator::make(request()->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        if ($validar->fails()) {
            return response()->json([
                "errors" => $validar->errors()->getMessages(),

            ], 400);
        }
    }
}
