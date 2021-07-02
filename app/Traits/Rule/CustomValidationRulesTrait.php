<?php
/**
 * Created by PhpStorm.
 * User: HP15
 * Date: 04/08/19
 * Time: 10:08 ص
 */

namespace App\Traits\Rule;

use Illuminate\Validation\Rule;

trait CustomValidationRulesTrait
{

    public function checkExistsWithActive($table ,$column ) {
       return Rule::exists($table , $column)->whereNull('deleted_at')->where('status' ,1);
    }
    public function checkUniqueWithActive($table ,$column , $active = true ) {
        $rule = Rule::unique($table , $column)->whereNull('deleted_at');
        if($active) {
            $rule = $rule->where('status' ,1);
        }
        return $rule;
    }
    public function checkUniqueIgnoreWithActive($table ,$column , $id ,$ignore_column = 'id' , $active = true ) {
        $rule = Rule::unique($table , $column)->whereNull('deleted_at')
            ->ignore($id , $ignore_column);
        if($active) {
            $rule = $rule->where('status' ,1);
        }
        return $rule;
    }
}
