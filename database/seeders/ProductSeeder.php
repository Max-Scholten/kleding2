<?php

namespace Database\Seeders;

// database/seeders/ProductSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Rode broek', 'price' => 20.75, 'size' => 32],
            ['name' => 'Gele broek', 'price' => 25.95, 'size' => 34],
            ['name' => 'Oranje broek', 'price' => 45.00, 'size' => 34],
            ['name' => 'Groene schoenen', 'price' => 11.50, 'size' => 40],
            ['name' => 'Blauwe schoenen', 'price' => 13.00, 'size' => 45],
            ['name' => 'Rode schoenen', 'price' => 45.95, 'size' => 44],
            ['name' => 'Gele schoenen', 'price' => 55.95, 'size' => 41],
            ['name' => 'Oranje schoenen', 'price' => 45.75, 'size' => 45],
            ['name' => 'Groene trui', 'price' => 13.50, 'size' => 'XL'],
            ['name' => 'Blauwe trui', 'price' => 24.95, 'size' => 'L'],
            ['name' => 'Rode trui', 'price' => 45.95, 'size' => 'S'],
            ['name' => 'Gele trui', 'price' => 57.95, 'size' => 'L'],
            ['name' => 'Oranje trui', 'price' => 45.95, 'size' => 'XL'],
            ['name' => 'Groene jas', 'price' => 75.00, 'size' => 'XL'],
            ['name' => 'Blauwe jas', 'price' => 55.45, 'size' => 'L'],
            ['name' => 'Rode jas', 'price' => 65.95, 'size' => 'XL'],
            ['name' => 'Gele jas', 'price' => 97.95, 'size' => 'S'],
            ['name' => 'Oranje jas', 'price' => 65.45, 'size' => 'L'],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
