<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'category_name' => 'technology',
                'category_description' => 'Kategori Teknologi ini berfokus pada pemrograman web, di mana saya membagikan pengetahuan dan pengalaman terkait pengembangan situs web serta bahasa pemrograman dan framework yang digunakan. Di sini, Anda akan menemukan tutorial dan tips yang dirancang untuk membantu Anda memahami konsep dasar hingga teknik lanjutan dalam pemrograman web. Dengan informasi yang praktis, saya berharap dapat memberikan wawasan berguna bagi para pengembang, baik pemula maupun yang berpengalaman. Selamat membaca!'
            ],
            [
                'category_name' => 'fitness',
                'category_description' => 'Kategori Fitness ini bertujuan untuk memberikan informasi dan panduan seputar kesehatan dan kebugaran, termasuk program latihan, nutrisi, serta tips untuk menjaga gaya hidup aktif. Di sini, Anda akan menemukan artikel yang membahas berbagai jenis olahraga, teknik latihan yang efektif, dan cara mengatur pola makan yang seimbang. Dengan pendekatan yang praktis dan mudah dipahami, saya berharap dapat membantu Anda mencapai tujuan kebugaran dan meningkatkan kualitas hidup secara keseluruhan. Selamat membaca!'
            ],
        ]);
    }
}
