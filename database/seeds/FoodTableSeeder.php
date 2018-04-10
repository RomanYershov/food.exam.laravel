<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('foods')->insert([
           'name' => 'Десерт из ананаса с клубникой и личи',
           'recipe' => 'ИНГРЕДИЕНТЫ
1 ананас
100 г клубники
100 г плодов личи
1 ст. л. сахарной пудры
3 ст. л. светлого рома
ПОШАГОВЫЙ РЕЦЕПТ ПРИГОТОВЛЕНИЯ
Шаг 1
Ананас разрезать по диагонали, вырезать мякоть, крупно порубить.

Шаг 2
Клубнику промыть, удалить плодоножку.

Шаг 3
Личи очистить от кожуры, удалить косточки. Мякоть ананаса, клубнику и личи выложить в миску.

Шаг 4
Сахарную пудру растворить в роме и этим сиропом залить фрукты. Настоять 20 мин. Вынуть и уложить внутрь чаши ананаса.',
           'category_id' => Category::first()->id,
           'image' => 'food.jpg'
       ]);
    }
}
