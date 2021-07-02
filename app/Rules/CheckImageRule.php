<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;

class CheckImageRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
        try {
            $file = File::mimeType($value);
            $index = strpos($file, '/');
            $type = substr($file, 0, $index);
            return strtolower(trim($type)) == 'image';
        }catch (\Exception $e ) {
            return false;
        }catch (\Error $e) {
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('error.file_not_image');
    }
}
