<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\MenuItem;

class BlogpostsBreadTypeAdded extends Seeder
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

            $dataType = DataType::where('name', 'blogposts')->first();

            if (is_bread_translatable($dataType)) {
                $dataType->deleteAttributeTranslations($dataType->getTranslatableAttributes());
            }

            if ($dataType) {
                DataType::where('name', 'blogposts')->delete();
            }

            \DB::table('data_types')->insert(array (
                'id' => 4,
                'name' => 'blogposts',
                'slug' => 'blogposts',
                'display_name_singular' => 'Blogpost',
                'display_name_plural' => 'Blogposts',
                'icon' => NULL,
                'model_name' => 'App\\Models\\Blogpost',
                'description' => NULL,
                'generate_permissions' => 1,
                'created_at' => '2023-02-13 17:35:49',
                'updated_at' => '2023-02-15 03:49:46',
                'server_side' => 0,
                'controller' => NULL,
                'policy_name' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
            ));

            
            

            Voyager::model('Permission')->generateFor('blogposts');

            $menu = Menu::where('name', config('voyager.bread.default_menu'))->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'Blogposts',
                'url' => '',
                'route' => 'voyager.blogposts.index',
            ]);

            $order = Voyager::model('MenuItem')->highestOrderMenuItem();

            if (!$menuItem->exists) {
                $menuItem->fill([
                    'target' => '_self',
                    'icon_class' => '',
                    'color' => null,
                    'parent_id' => null,
                    'order' => $order,
                ])->save();
            }
        } catch(Exception $e) {
           throw new Exception('Exception occur ' . $e);

           \DB::rollBack();
        }

        \DB::commit();
    }
}
