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

   public function update($data, $id_soal) {
      $edit = Soal::find($id_soal);
      $edit->update($data);
   }

   public function destroy($id_soal) {
      $data = Soal::find($id_soal);
      $data->delete();
   }

}