<?php

use Illuminate\Database\Seeder;

class ShareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['モルモットのスイカ警察','FlowBack-RUN'];
        $links = ['https://www.youtube.com/embed/BUHassReFnE','https://www.youtube.com/embed/yfkSbnS_4YY'];
        $comments = ['モルモットさんらがスイカを食べ、撫でられている癒しの動画。','FIVE NEW OLDプロデュース曲。FlowBackが完全に各自宅から撮影、TATSUKIが構成・コレオグラフ・編集を手掛けたメンバー完全プロデュースの作品。'];
        for($i = 0; $i < 2; $i++){
          DB::table('shares')->insert([
            'title' => $titles[$i],
            'link' => $links[$i],
            'comment' => $comments[$i],
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
          ]);
        }
    }
}
