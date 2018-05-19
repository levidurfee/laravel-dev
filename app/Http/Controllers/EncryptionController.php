<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptionController extends Controller
{
    public function index()
    {
        $password = "testing";
        //$salt = openssl_random_pseudo_bytes(256);
        $salt = hex2bin("8393ec0a025ab63bf56881bdc645f65ba756c1915d5427b9c7c32e26c44d6c887e9409cd7a183d615743f5c396c5ec4eb373ea68999083a664bfe927c1e9d4c007bcee2afc81480f044378ffd67bbb86929f4946aa5ca4087f6cbed3ad670de0247429a15cfddd20b59bc8ada02bd3e7702407c14bf7d726be2d8bd691713c00f2050d64d15a5ec9529a1ffd91160b4822e2c870cdd6a78f93bb4f838d6730f5b1690356a6814709210f515db6f7b92f0d1166b8feff89f30b57f09424e9877ce8dea13efaeffb6b06237516b94f0e3bedce3f58d6836d80f664dab448bcfc21b04615f9debbed937d1ecbea150cebcef7e16704745870e065a933d00e7707a5");

        $key = openssl_pbkdf2($password, $salt, 32, 20000, 'sha256');

        return view('encryption', [
            'key' => bin2hex($key),
            'salt' => bin2hex($salt)
        ]);
    }
}
