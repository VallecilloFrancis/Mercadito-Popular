<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_del_proveedor' => $this -> faker -> name(),
            'correo'=>$this -> faker ->email(),
            'telefono'=> $this -> faker -> phoneNumber(),
            'nombre_del_contacto_proveedor'=> $this -> faker -> name(),
            
            //
        ];
    }
}
