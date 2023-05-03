<?php

namespace App\Repositories;

use App\Repositories\Contracts\LoginContract;
use App\Models\User;
use GuzzleHttp\Client;

class LoginRepository implements LoginContract
{

   public function login(array $data)
   {  
      // dd($data['stambuk']);
      $client = new Client();
      // $respons = Http::withUrlParameters([
      //     'user' => $request->stambuk,
      //     'pass' => $request->password,
      // ])->get('service.undipa.ac.id/mhs.php?api=071994');

      $res = $client->post('service.undipa.ac.id/mhs.php?', [
         'query' => [
            'user' => $data['stambuk'],
            'pass' => $data['password'],
            'api'  => '071994',
         ]
      ]);

      

      $users = json_decode((string)$res->getBody(), true);
      
      $input = User::create([
         'nama' => $users['data'][0]['nmmhs'],
         'stb' => $users['data'][0]['stb'],
         'email' => $users['data'][0]['email'],
         'no_hp' => $users['data'][0]['nohp'],
         'alamat' => $users['data'][0]['alm'],
      ]);
      // dd($input);
      return $users;
   }
}
