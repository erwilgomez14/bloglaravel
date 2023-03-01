<?php

namespace App\Console\Commands;

use App\Models\Backend\Rol;
use App\Models\Usuario;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando ejecuta el instalador del proyecto';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if (!$this->verificar()) {

            $rol = $this->crearRolSU();
            $usuario = $this->crearUsuarioSU();
            // $usuario = Usuario::find(1);
            $usuario->roles()->attach($rol);
            $this->line('El rol y usuario SU se instalaron correctamente');
        }
        else
        {
            $this->error('No se puede ejecutar el instalador, ya hay un rol SU creado');
        }

        //
    }

    private function verificar()
    {
        return Rol::find(1);



    }

    private function crearRolSU()
    {
        $rol = "Super Administrador";
        return Rol::create([
            'nombre' => $rol,
            'slug' => Str::slug($rol, '_')
        ]);
    }
    private function crearUsuarioSU()
    {
        return Usuario::create([
            'nombre' => 'ares',
            'email' => 'erwil@erwil.com',
            'password' => Hash::make('123456'),
            'estado' => 1
        ]);
    }
}
