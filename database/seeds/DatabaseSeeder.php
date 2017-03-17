<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('order')->insert(	[array('product_name' => 'Honda' ,'price'=>'2000','address'=>'Japan' ),
        	array('product_name' => 'Yamaha' ,'price'=>'200','address'=>'VietNam' ),
        	array('product_name' => 'BMW' ,'price'=>'9000','address'=>'Gemany' ),
        	array('product_name' => 'Lexus' ,'price'=>'11000','address'=>'Japan' )]);
        DB::table('customer')->insert([array('name'=>'Huyen', 'number_phone'=>5555),
        	array('name'=>'Huong', 'number_phone'=>666),
        	array('name'=>'Thao', 'number_phone'=>777),
        	array('name'=>'Ly', 'number_phone'=>888)]);
        DB::table('news')->insert([array('title' => 'title 1','cate_id'=>'2','sapo'=>
            'tin tuc title 1','content'=>'content 1' ),
        array('title' => 'title 2','cate_id'=>'2','sapo'=>
            'tin tuc title 2','content'=>'content 2' ),
        array('title' => 'title 3','cate_id'=>'3','sapo'=>
            'tin tuc title 3','content'=>'content 3' ),
        array('title' => 'title 4','cate_id'=>'2','sapo'=>
            'tin tuc title 4','content'=>'content 4' ),
        array('title' => 'title 5','cate_id'=>'2','sapo'=>
            'tin tuc title 5','content'=>'content 5' )
        ]);
        DB::table('form_dangky')->insert([array('ten_mon_hoc'=>'PHP','gia_tien'=>'20000000','ten_giang_vien'=>'Mr Thang','images'=>'anh1')]);
    }
}
