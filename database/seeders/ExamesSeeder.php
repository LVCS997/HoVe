<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exame;
use App\Models\CategoriaExame;
use App\Models\SubcategoriaExame;

class ExamesSeeder extends Seeder
{
    public function run()
    {
        // 1. Radiografia Simples
        $radiografiaSimples = Exame::create(['nome' => 'Radiografia Simples']);

        // Categorias e subcategorias da Radiografia Simples
        $categoriasRadiografia = [
            'Tórax' => [],
            'Abdômen' => [],
            'Pelve' => [],
            'Pescoço' => [],
            'Crânio' => ['Crânio','ATM', 'Mandíbula', 'Maxilar', 'Bulas Timpânicas', 'Seios Nasais', 'Calota Craniana'],
            'Coluna' => ['Coluna', 'Cervical', 'Cervitorácica', 'Toracolombar', 'Lombar', 'Lombossacra', 'Caudal'],
            'Membro Torácico' => ['Membro Torácico','Esquerdo', 'Direito', 'Escápula', 'Ombro', 'Úmero', 'Cotovelo', 'Rádio e Ulna', 'Carpo', 'Dígitos'],
            'Membro Pélvico' => ['Membro Pélvico', 'Esquerdo', 'Direito', 'Coxofemoral', 'Fêmur', 'Joelho', 'Tíbia e Fíbula', 'Tarso', 'Dígitos'],
        ];

        foreach ($categoriasRadiografia as $categoria => $subcategorias) {
            $categoriaExame = CategoriaExame::create([
                'exame_id' => $radiografiaSimples->id,
                'nome' => $categoria,
            ]);

            foreach ($subcategorias as $subcategoria) {
                SubcategoriaExame::create([
                    'categoria_id' => $categoriaExame->id,
                    'nome' => $subcategoria,
                ]);
            }
        }

        // 2. Ultrassonografia
        $ultrassonografia = Exame::create(['nome' => 'Ultrassonografia']);

        // Categorias e subcategorias da Ultrassonografia
        $categoriasUltrassonografia = [
            'Abdominal' => [],
            'Ocular' => [],
            'Cervical' => [],
            'Outros' => [],
        ];

        foreach ($categoriasUltrassonografia as $categoria => $subcategorias) {
            $categoriaExame = CategoriaExame::create([
                'exame_id' => $ultrassonografia->id,
                'nome' => $categoria,
            ]);

            foreach ($subcategorias as $subcategoria) {
                SubcategoriaExame::create([
                    'categoria_id' => $categoriaExame->id,
                    'nome' => $subcategoria,
                ]);
            }
        }

        // 3. Tomografia Computadorizada
        $tomografia = Exame::create(['nome' => 'Tomografia Computadorizada']);

        // Categorias e subcategorias da Tomografia Computadorizada
        $categoriasTomografia = [
            'Tórax' => [],
            'Abdômen' => [],
            'Pescoço' => [],
            'Crânio' => ['Crânio', 'Bulas Timpânicas', 'Seios Nasais', 'Encéfalo'],
        ];

        foreach ($categoriasTomografia as $categoria => $subcategorias) {
            $categoriaExame = CategoriaExame::create([
                'exame_id' => $tomografia->id,
                'nome' => $categoria,
            ]);

            foreach ($subcategorias as $subcategoria) {
                SubcategoriaExame::create([
                    'categoria_id' => $categoriaExame->id,
                    'nome' => $subcategoria,
                ]);
            }
        }

        // 4. Cardiologia
        $cardiologia = Exame::create(['nome' => 'Cardiologia']);

        // Categorias e subcategorias da Cardiologia
        $categoriasCardiologia = [
            'Ecocardiograma' => [],
            'Eletrocardiograma' => [],
            'Avaliação Pré-Anestésica' => [],
        ];

        foreach ($categoriasCardiologia as $categoria => $subcategorias) {
            $categoriaExame = CategoriaExame::create([
                'exame_id' => $cardiologia->id,
                'nome' => $categoria,
            ]);

            foreach ($subcategorias as $subcategoria) {
                SubcategoriaExame::create([
                    'categoria_id' => $categoriaExame->id,
                    'nome' => $subcategoria,
                ]);
            }
        }
    }
}
