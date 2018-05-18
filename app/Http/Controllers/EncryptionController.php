<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptionController extends Controller
{
    public function index()
    {
        $password = "testing";
        $salt = openssl_random_pseudo_bytes(256);

        $key = openssl_pbkdf2($password, $salt, 32, 20000, 'sha256');

        return view('encryption', ['key' => bin2hex($key)]);
    }
}
