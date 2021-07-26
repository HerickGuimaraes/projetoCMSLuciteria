<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criando usuario padrão
        $user = new User();
        if ($user->create([
            'nome' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('123'),
            'cpf' => "56976124004",
            'admin' => 1
        ])) {
            echo "Usuario criado com sucesso!";
        }

        $data = [
            ["nome" => 'title', "content" => "Admin"],
            ["nome" => 'subtitle', "content" => "Teste"],
            ["nome" => 'email', "content" => "admin@gmail.com"],
            ["nome" => 'bgcolor', "content" => "#000"],
            ["nome" => 'textcolor', "content" => "green"],
        ];

        foreach ($data as $item) {
            $setting = new Setting();
            if ($setting->create($item)) {
                echo "Settings criado com sucesso!";
            }
        }
    }
}
