<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;


class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Documento::insert([
            [
                'tipo_documento'=> 'C.I'
            ],
            [
                'tipo_documento'=> 'RUC'
            ],
            [
                'tipo_documento'=> 'Cedula Extranjera'
            ],
        ]);
    }
}