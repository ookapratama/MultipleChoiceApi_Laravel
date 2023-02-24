<?php

namespace App\Repositories\Contracts;

interface SoalContract {

   public function index();
   public function store($data);
   public function edit($id_soal);
   public function update($data, $id_soal);
   public function destroy($id_soal);

}