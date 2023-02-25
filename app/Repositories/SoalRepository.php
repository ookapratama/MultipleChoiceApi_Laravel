<?php

namespace App\Repositories;

use App\Repositories\Contracts\SoalContract;
use App\Models\Soal;


class SoalRepository implements SoalContract {

   public function index() {
      $data = Soal::all();
      return $data;
   }

   public function store($data) {
      $input = Soal::create($data);
      return $input;
   }

   public function jawab($data, $id_soal) {
      $input = Soal::find($id_soal);
      // dd($data['jawab']);
      if ($data['jawab'] == $input['kunci']) {
         $input['jawab'] = $data['jawab'];
         $input['status'] = 'benar';
      }
      else if($data['jawab'] != $input['kunci']) {
         $input['jawab'] = '';
         $input['status'] = 'salah';
      }
      else {
         $input['jawab'] = '';
         $input['status'] = 'belum dijawab';        
      }
      // dd($input['jawab']);
      $input->save();
   }

   public function edit ($id) {
      $data = Soal::find($id);
      return $data;
   }

   public function update($data, $id_soal) {
      $edit = Soal::find($id_soal);
      $edit->update($data);

   }

   public function destroy($id_soal) {
      $data = Soal::find($id_soal);
      $data->delete();
   }

}