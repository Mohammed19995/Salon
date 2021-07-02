<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 21/7/2020
 * Time: 09:29 م
 */

namespace App\ServiceInterfaces\Export;


interface Exportable
{

    public function export($data);
}