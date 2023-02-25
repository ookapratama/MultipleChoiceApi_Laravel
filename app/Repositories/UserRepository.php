<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserContract;
use App\Models\User;


class UserRepository implements UserContract {

   public function index() {
      $data = User::all();
      return $data;
   }

   public function register($data) {
      // dd($data['nama']);
      $user = User::create([
         'nama'          => $data['nama'],
         'stb'           => $data['stb'],
         'email'         => $data['email'],
         'password'      => encrypt($data['password'])
     ]);

     return $user;
   }

   public function forget($data, $id_User) {
      $old = User::find($id_User);
      // dd($data['old_password']);
      
      $old['password'] = encrypt($data['new_password']);
      $update = $old->save();
      return $update;
   }

   public function edit ($id) {
      $data = User::find($id);
      return $data;
   }

   public function update($data, $id_User) {
      // dd($id_User);
      $edit = User::find($id_User);
      $edit->update($data);

   }

   public function destroy($id_User) {
      $data = User::find($id_User);
      $data->delete();
   }

}