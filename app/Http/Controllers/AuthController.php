<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function App\Http\Helpers\catchError;
use function App\Http\Helpers\success;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        $universities = University::pluck('name', 'id');
        return view('auth.register', compact('universities'));
    }

    public function create_acount(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username',
                'phone' => 'required',
                'password' => 'required|min:8|confirmed',
                'university_id' => 'required|exists:universities,id',
                'terms' => 'required'
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'university_id' => $request->university_id,
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;
            return success('Usuario creado con éxito', [
                'token' => $token,
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            return catchError($th);
        }
    }

    public function access(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|min:8'
            ]);
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                $user = User::where('username', $request->username)->with('university')->first();
                $token = $user->createToken('auth_token')->plainTextToken;
                return success([
                    'token' => $token,
                    'user' => UserResource::make($user)
                ],null,
                'Usuario logueado con éxito', );
            }
            return back()->withErrors([
                'username' => 'Los datos ingresados son inválidos.',
            ]);
        } catch (\Throwable $th) {

            return catchError($th);
        }
    }
    public function prueba()
    {

        dd(University::get()->pluck('central', 'name'));
    }
}
