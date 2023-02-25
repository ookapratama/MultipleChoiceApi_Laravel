<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Contracts\UserContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $userContract;

    public function __construct(UserContract $userContract)
    {
        $this->userContract = $userContract;
    }

    public function index() {
        $data = $this->userContract->index();
        return response()->json([
            'Data' => $data,
        ]);
    }

    public function register(Request $request) {
        // dd($request->all());
        $validasi = Validator::make($request->all(), 
        [
            'nama'      => 'required',
            'stb'       => 'required|unique:users',
            'email'     => 'required|unique:users|email',
            'password'  => 'required|confirmed|min:8',
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 422);
        }

        $user = $this->userContract->register($request->all());
        
        if ($user) {
            return response()->json([
                'success' => true,
                'user'  => $user,
            ], 201);
        }
   
        return response()->json([
            'success' => false,
        ], 410);

    }

    public function forget_password(Request $request, $id) {

        $validasi = Validator::make($request->all(), 
        [
            'old_password'  => 'required',
            'new_password'      => 'required|confirmed|min:8',
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 422);
        }
        
        $user_id = User::find($id);
        if ($request->old_password != decrypt($user_id->password)) {
            return response()->json([
                'success'   => false,
                'Info'      => 'Password Lama Tidak Sesuai'
            ], 422);
        }

        $input = $this->userContract->forget($request->all(), $id);

        if ($input) {
            return response()->json([
                'success' => true,
                'user'  => User::find($id),
            ], 201);
        }
   
        return response()->json([
            'success' => false,
        ], 410);

    }
}
