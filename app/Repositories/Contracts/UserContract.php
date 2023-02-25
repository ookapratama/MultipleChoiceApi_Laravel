<?php

namespace App\Repositories\Contracts;

interface UserContract {

   public function index();
   public function register($data);
   public function forget($data, $id_user);
   public function edit($id_soal);
   public function update($data, $id_soal);
   public function destroy($id_soal);

}