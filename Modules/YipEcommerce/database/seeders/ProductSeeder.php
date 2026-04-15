<?php

namespace Modules\YipEcommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\YipEcommerce\Models\Product;   // Correct namespace for this module setup

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Premium Ankara Fabric (6 yards)',
                'description' => 'High-quality vibrant Ankara print perfect for fashion and home decor. Made in Nigeria.',
                'price'       => 8500.00,
                'image'       => 'https://i.etsystatic.com/12553175/r/il/d0e6d4/6263778327/il_fullxfull.6263778327_d0rh.jpg',
                'stock'       => 45
            ],
            [
                'name'        => 'Natural Shea Butter (500g)',
                'description' => 'Pure unrefined shea butter from Ghana. Excellent for skin and hair care.',
                'price'       => 3200.00,
                'image'       => 'https://ng.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/01/7544914/1.jpg?8969',
                'stock'       => 80
            ],
            [
                'name'        => 'Jollof Spice Mix (250g)',
                'description' => 'Authentic West African spice blend for perfect Jollof rice.',
                'price'       => 1450.00,
                'image'       => 'https://africannatural.s3.us-east-1.amazonaws.com/product/120/qSjLsCpTktt2IYxOKVG2tR1hX6TLhtv0cX26BfI4.webp',
                'stock'       => 120
            ],
            [
                'name'        => 'Handwoven Aso Oke Scarf',
                'description' => 'Luxury traditional Yoruba handwoven scarf. Elegant and timeless.',
                'price'       => 5200.00,
                'image'       => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2YpLfZDMOXtUhMocZeczuINebABIaWEWCnw&s',
                'stock'       => 30
            ],
            [
                'name'        => 'African Black Soap (Pack of 6)',
                'description' => 'Traditional handmade black soap from Ghana. Gentle on skin and hair.',
                'price'       => 2800.00,
                'image'       => 'https://usbeautybazaar.com/cdn/shop/files/1_1_b7056a5d-8a96-4dca-9e91-e9b9b9b445ad_medium.jpg?v=1727943801',
                'stock'       => 65
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        $this->command->info('✅ YipMart African products seeded successfully!');
    }
}