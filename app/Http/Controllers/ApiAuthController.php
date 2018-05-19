<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function login(Request $request)
    {
        try {
            $user = User::where(['email' => $request->username])->first();
        } catch(\Exception $e) {
            return $e->getMessage();
        }

        if (Hash::check($request->password, $user->password)) {
            return ['auth' => 'success'];
        }

        return ['auth' => 'failed'];
    }
}
