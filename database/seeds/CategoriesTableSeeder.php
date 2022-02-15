<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

// Model import
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Enoteca',
            'Prodotti biologici',
            'Mascherine',
            'Igienizzanti',
            'Pesce',
            'Carne',
            'Frutta',
            'Verdura',
            'Uova latte e latticini',
            'Salumi e formaggi',
            'Gastronomia',
            'Pane farine e preparati',
            'Dispensa',
            'Acqua e analcolici',
            'Vini e Birre',
            'Altri alcolici',
            'Gelati e surgelati',
            'Bambini e baby',
            'Cura della persona',
            'Repellenti e insetticidi',
            'Bucato',
            'Cura della casa',
            'Animali',
            'Calze e intimo',
            'Limited Edition',
            'Casalinghi',
            'Cartoleria e Lampadine'
        ];

        foreach($categories as $category) {
            // Nuova istanza del model Category
            $new_category = new Category();

            // Associa le colonne alla nuova istanza
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, '-');

            // Salva l'istanza come nuovo record nel db
            $new_category->save();
        }
    }
}
