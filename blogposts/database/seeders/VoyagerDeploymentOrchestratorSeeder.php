<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class VoyagerDeploymentOrchestratorSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = '';

    public function run()
    {
        $this->seed(BlogpostsBreadTypeAdded::class);
        $this->seed(BlogpostsBreadRowAdded::class);
    }
}
