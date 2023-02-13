<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login (Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
            'device_name' => 'required|string',
        ]);

        $user = User::whereEmail($request->email)->first();

        //jika user tidak ada atau password tidak sesuai
        if(!$user || !Hash::check($request->password, $user->password)) {
            
            //kita ngasi pesan error 
            throw ValidationException::withMessages([

                //dengan key 'email. dan pesan 'Email atau Password Salah!!'
                'email' => 'Email atau Password Salah!!',
            ]);
        }

        return [
        //jika benar atau berhasil kita mau ngasi access_token/kunci
        //kita kasi perintah bikin token dengan parameter device_name untuk membedakan token mana untuk device yang mana
        //kita mau nampilin token yang bisa kita baca
        'access_token' => $user->createToken($request->device_name)->plainTextToken,
        
        //dan kembalikan usernya
        'user' => $user,
        ];
    }

    public function logout (Request $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }

    public function register (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        return User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    public function profile (Request $request)
    {
        return $request->user();
    }
}
