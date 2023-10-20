<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Produto::class;
    public function definition(): array
    {
        return [
            //
            'name' => Str::random(10),
            'desc' => Str::random(10),
            'price'=> random_int(1,100),
            'stock'=> random_int(1,100),
            'created_at'  => now()
        ];
    }
}
