<?php

use Illuminate\Database\Seeder;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $ro = \App\Role::create([
      'nombreRole'  => 'Administrador',
  ]);

  $author = \App\Role::create([
      'nombreRole'   => 'Vaquero',
  ]);

    }
}
