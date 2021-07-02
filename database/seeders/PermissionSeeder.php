<?php
namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $parents = [
            'user'                 => ['view', 'add', 'edit', 'delete'],
            'auction'              => ['view', 'add', 'edit', 'delete'],
            'order'                => ['view','edit' , 'delete'],
            'bank'                 => ['view', 'add', 'edit', 'delete'],
            'bank_transfer'        => ['view', 'add', 'edit', 'delete'],
            'notification'         => ['view',  'add'],
            'country'              => ['view', 'edit'],
            'city'                 => ['view', 'add', 'edit', 'delete'],
            'neighborhood'         => ['view', 'add', 'edit', 'delete'],
            'gallery'              => ['view', 'add', 'edit', 'delete'],
            'setting'              => ['view', 'edit'],

        ];
        $index = 1;
        foreach ($parents as $parent => $types) {
            foreach ($types as $type) {
                Permission::create(['name' => $this->transType($type), 'key' => "$type" . "_" . $parent, 'parent' => $parent, 'order_by' => $index]);
            }
            $index++;
        }

    }

    public function transType($type)
    {
        switch ($type) {
            case 'view' :
                return ['ar' => 'عرض', 'en' => 'view'];
            case 'add' :
                return ['ar' => 'إضافة', 'en' => 'add'];
            case 'edit' :
                return ['ar' => 'تعديل', 'en' => 'edit'];
            case 'delete' :
                return ['ar' => 'حذف', 'en' => 'delete'];
            case 'control' :
                return ['ar' => 'التحكم', 'en' => 'control'];
        }
    }
}
