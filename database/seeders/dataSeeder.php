<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('books')->insert([
                'name' => $faker->sentence(3), // Sinh tiêu đề sách với 3 từ
                'author' => $faker->name, // Tên tác giả
                'category' => $faker->word, // Một từ ngẫu nhiên làm thể loại
                'year' => $faker->year, // Năm xuất bản
                'quantity' => $faker->numberBetween(1, 100), // Số lượng từ 1 đến 100
            ]);
        }
            foreach (range(1, 10) as $index) {
                DB::table('readers')->insert([
                    'name' => $faker->name,
                    'birthday' => $faker->date('Y-m-d', '2005-12-31'), // Ngày sinh trước 2005
                    'address' => $faker->address,
                    'phone' => $faker->phoneNumber,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
        foreach (range(1, 10) as $index) { // Sinh 20 dòng dữ liệu
            DB::table('borrows')->insert([
                'reader_id' => rand(1, 10), // Giả định có 10 readers
                'book_id' => rand(1, 10),   // Giả định có 15 books
                'borrow_date' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'return_date' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'status' => rand(0, 1), // Ngẫu nhiên trạng thái mượn/trả
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
}
}