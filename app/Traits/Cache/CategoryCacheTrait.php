<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Cache;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Facades\TreeFunctionFacade;
use Illuminate\Support\Facades\Cache;

trait CategoryCacheTrait
{

    public function getCategoryData($id = -1)
    {
        $categories = Category::with(['allchildren', 'allparents']);
        if ($id != -1) {
            $categories = $categories->where('id', '=', $id);
        }
        $categories = $categories->get()->map(function ($value) {
            $value->get_parents = TreeFunctionFacade::getBelongsToElements($value->allparents);
            $value->get_children = TreeFunctionFacade::getHasManyElements($value->allchildren);

            $parents = collect($value->get_parents)->pluck('name')->toArray();
            $value->get_parents_name = count($parents) > 0 ? " ( ". implode(" / " , $parents)." ) " : "";
            return $value;
        });
        return $categories;
    }
    public function getCategoryAsSpecificArrange($id = -1) {
        $all_categories = $this->getCategoryData($id);
        $new_all_categories = new Collection();
        foreach ($all_categories->where('parent_id','=',null) as $new_category) {
            $new_all_categories->push($new_category);
            $new_all_categories = $new_all_categories->merge($all_categories->whereIn('id' , collect($new_category->get_children)->pluck('id')->toArray()));

        }
        return $new_all_categories;
    }

    // cache
    public function storeCategoriesInCache($categories_cache = null) {
        if(is_null($categories_cache)) {
            $categories_cache = $this->getCategoryAsSpecificArrange(-1);
        }
        Cache::put('categories_cache' , $categories_cache);

    }
}
