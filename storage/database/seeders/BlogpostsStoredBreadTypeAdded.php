<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\MenuItem;

class BlogpostsStoredBreadTypeAdded extends Seeder
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

            if (is_bread_translatable($dataType)) {
                $dataType->deleteAttributeTranslations($dataType->getTranslatableAttributes());
            }

            if ($dataType) {
                DataType::where('name', 'blogposts_stored')->delete();
            }

            \DB::table('data_types')->insert(array (
                'id' => 8,
                'name' => 'blogposts_stored',
                'slug' => 'blogposts-stored',
                'display_name_singular' => 'Blogposts Stored',
                'display_name_plural' => 'Blogposts Stored',
                'icon' => NULL,
                'model_name' => 'App\\Models\\BlogpostStored',
                'description' => NULL,
                'generate_permissions' => 1,
                'created_at' => '2023-02-14 15:04:07',
                'updated_at' => '2023-02-15 04:27:08',
                'server_side' => 0,
                'controller' => NULL,
                'policy_name' => NULL,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
            ));

            
            

            Voyager::model('Permission')->generateFor('blogposts_stored');

            $menu = Menu::where('name', config('voyager.bread.default_menu'))->firstOrFail();

            $menuItem = MenuItem::firstOrNew([
                'menu_id' => $menu->id,
                'title' => 'Blogposts Stored',
                'url' => '',
                'route' => 'voyager.blogposts-stored.index',
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
