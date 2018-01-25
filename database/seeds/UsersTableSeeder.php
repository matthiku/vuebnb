<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  public function run()
  {
    User::create([
      'name'      => 'Jane Doe',
      'email'     => 'test@gmail.com',
      'password'  => Hash::make('test'),
      'saved'     => [1,5,7,9]
    ]);
  }
}
