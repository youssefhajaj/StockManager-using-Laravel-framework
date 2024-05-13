<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produit;

class ProduitInsert extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produit::create([
            'name' => 'Switch',
            'prix' => 700,
            'quantite' => 50,
            'type' => 'industriel',
            'image' => 'img/produits/switch.jpg'
        ]);
        
    }
}
