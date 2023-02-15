<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class BlogpostsStoredBreadRowAdded extends Seeder
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

            $dataType = DataType::where('name', 'blogposts_stored')->first();

            \DB::table('data_rows')->insert(array (
                0 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'id',
                    'type' => 'text',
                    'display_name' => 'Id',
                    'required' => true,
                    'browse' => true,
                    'read' => true,
                    'edit' => false,
                    'add' => false,
                    'delete' => false,
                    'details' => '{}',
                    'order' => 1,
                ),
                1 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'text',
                    'type' => 'text',
                    'display_name' => 'Text',
                    'required' => true,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'order' => 2,
                ),
                2 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'title',
                    'type' => 'text',
                    'display_name' => 'Title',
                    'required' => true,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'order' => 4,
                ),
                3 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'post_id',
                    'type' => 'text',
                    'display_name' => 'Post Id',
                    'required' => true,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'order' => 5,
                ),
                4 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'post_date',
                    'type' => 'timestamp',
                    'display_name' => 'Post Date',
                    'required' => true,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'order' => 6,
                ),
                5 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'last_parse',
                    'type' => 'timestamp',
                    'display_name' => 'Last Parse',
                    'required' => true,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => true,
                    'delete' => true,
                    'details' => '{}',
                    'order' => 7,
                ),
                6 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'created_at',
                    'type' => 'timestamp',
                    'display_name' => 'Created At',
                    'required' => false,
                    'browse' => true,
                    'read' => true,
                    'edit' => true,
                    'add' => false,
                    'delete' => true,
                    'details' => '{}',
                    'order' => 8,
                ),
                7 => 
                array (
                    'data_type_id' => $dataType->id,
                    'field' => 'updated_at',
                    'type' => 'timestamp',
                    'display_name' => 'Updated At',
                    'required' => false,
                    'browse' => false,
                    'read' => false,
                    'edit' => false,
                    'add' => false,
                    'delete' => false,
                    'details' => '{}',
                    'order' => 9,
                ),
            ));
        } catch(Exception $e) {
            throw new Exception('exception occur ' . $e);

            \DB::rollBack();
        }

        \DB::commit();
    }
}

