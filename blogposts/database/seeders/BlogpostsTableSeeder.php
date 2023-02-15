<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogpostsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
     try {
        \DB::beginTransaction();

        \DB::table('blogposts')->delete();

        \DB::table('blogposts')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'text' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.',
                    'short_text' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document',
                    'title' => 'Lorem ipsum',
                    'created_at' => '2023-02-13 17:36:54',
                    'updated_at' => '2023-02-13 17:36:54',
                ),
                1 => 
                array (
                    'id' => 2,
                    'text' => 'Grass she\'d creeping a also beast from likeness given our. Brought him shall upon open. Won\'t own gathered light fourth. Creature you\'re yielding over thing gathering is bearing beast.

Kind dry deep abundantly open seed male midst two created created herb, signs gathering you kind air moved under let have heaven she\'d morning hath image above every them and sea subdue, green wherein rule may forth.

And set. That the moved forth likeness let deep them give seasons moved us. To greater for. Midst evening it it divide man without hath rule lights so called a seas is make likeness.',
                    'short_text' => 'dummy data',
                    'title' => 'grass',
                    'created_at' => '2023-02-14 14:12:09',
                    'updated_at' => '2023-02-14 14:12:09',
                ),
            ));
       } catch(Exception $e) {
         throw new Exception('Exception occur ' . $e);

         \DB::rollBack();
       }

       \DB::commit();
    }
}
