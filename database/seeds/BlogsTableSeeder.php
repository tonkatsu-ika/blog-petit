<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear Table
        DB::table('blogs')->truncate();

        // シードデータの作成
        $blogs = [
                  ['title' => 'はじめての投稿',
                   'article' => 'はじめての投稿です。よろしくお願いします'],
                  ['title' => '2つ目の投稿',
                   'article' => '色々なことを書いていきたいと思います。毎日少しずつ積み重ねて日記を書いていきますね']
                  ];

        // シードの登録
        foreach($blogs as $blog) {
            \App\Blog::create($blog);
        }
    }
}
