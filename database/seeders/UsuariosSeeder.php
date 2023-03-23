<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name' => $faker->name,
                'apellido_paterno' => $faker->lastname,
                'apellido_materno' => $faker->lastname,
                'telefono' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'rol_id' => 3,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
            ]);
        // foreach ($this->usuarios as $usuario) {
        //     DB::table('users')->insert([
        //         'nombre' => $usuario['nombre'],
        //         'apellido_paterno' => $usuario['apellido_paterno'],
        //         'apellido_materno' => $usuario['apellido_materno'],
        //         'telefono' => $usuario['telefono'],
        //         'email' => $usuario['correo'],
        //         'email_verified_at' => now(),
        //         'password' => bcrypt($usuario['contrasenia']),
        //         'rol_id' => $usuario['rol'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        }
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'apellido_paterno' => $faker->lastname,
                'apellido_materno' => $faker->lastname,
                'telefono' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'rol_id' => 2,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
            ]);
        }
    }

    // public $usuarios = array(
    //     array('nombre' => 'Emmanuel', 'apellido_paterno' => 'Torres', 'apellido_materno' => 'Servin','telefono' => '5522665511', 'correo' => 'emmanuel.torres@deinsi.com', 'contrasenia' => '123456', 'rol' => 1),
    //     array('nombre' => 'Andrea', 'apellido_paterno' => 'Velasco', 'apellido_materno' => 'Velasco', 'telefono' => '112222112','correo' => 'avelasco@gafmx.mx', 'contrasenia' => '123456', 'rol' => 1),
    // );
}
