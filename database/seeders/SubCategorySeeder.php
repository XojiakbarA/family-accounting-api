<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incomesSubCats = [
            ['title' => 'Salary'],
            ['title' => 'Other Incomes'],
        ];
        $expensesSubCats = [
            ['title' => 'Foodstuffs'],
            ['title' => 'Transport'],
            ['title' => 'Mobile Phone'],
            ['title' => 'Internet'],
            ['title' => 'Entertainment'],
            ['title' => 'Others']
        ];
        $incomes = Category::where('title', 'Incomes')->first();
        $incomes->subCategories()->createMany($incomesSubCats);
        $expenses = Category::where('title', 'Expenses')->first();
        $expenses->subCategories()->createMany($expensesSubCats);
    }
}
