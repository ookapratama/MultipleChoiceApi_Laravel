<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserContract;
use App\Models\User;


class UserRepository implements UserContract
{

   public function index()
   {
      $data = User::all();
      return $data;
   }

   public function register($data)
   {

      $stb = '192408';
      $data_api = User::where('stb', $stb)->first();
      // dd($data_api);
      $data_api['tempat_lahir'] = $data['tempat_lahir'];
      $data_api['tgl_lahir'] = $data['tgl_lahir'];
      $data_api['agama'] = $data['agama'];
      $data_api['jkl'] = $data['jkl'];
      $data_api['asal_sekolah'] = $data['asal_sekolah'];
      $data_api['nm_ayah'] = $data['nm_ayah'];
      $data_api['nm_ibu'] = $data['nm_ibu'];
      $data_api['angkatan_kampus'] = $data['angkatan_kampus'];
      $data_api['pengalaman_organisasi'] = $data['pengalaman_organisasi'];
      $data_api['alasan_daftar'] = $data['alasan_daftar'];
      $data_api['pas_foto'] = $data['pas_foto'];
      $user = $data_api->save();


      return $user;
   }

   public function forget($data, $id_User)
   {
      $old = User::find($id_User);
      // dd($data['old_password']);

      $old['password'] = encrypt($data['new_password']);
      $update = $old->save();
      return $update;
   }

   public function edit($id)
   {
      $data = User::find($id);
      return $data;
   }

   public function update($data, $id_User)
   {
      // dd($id_User);
      $edit = User::find($id_User);
      $edit->update($data);
   }

   public function destroy($id_User)
   {
      $data = User::find($id_User);
      $data->delete();
   }
}
