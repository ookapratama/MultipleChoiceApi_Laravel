<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\LoginContract;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $loginContract;

    public function __construct(LoginContract $loginContract) 
    {
        $this->loginContract = $loginContract;
    }

    public function cek_login (Request $request) {
        $data = $this->loginContract->login($request->all());
        return response()->json([
            'status'    => true,
            'nama'      => $data['data'][0]['nmmhs'],
            'data'      => $data,
        ]);
    }
}
