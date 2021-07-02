<?php
namespace App\Services\Tree;

class TreeFunction {


    public function getHasManyElements($obj)
    {
        $result = array();
        foreach ($obj as  $row) {
            $result[] = $row;
            if (count($row->allchildren) > 0) {
                $result = array_merge($result, $this->getHasManyElements($row->allchildren));
            }
        }
        return $result;
    }

    public function getBelongsToElements($obj)
    {
        $result = array();
        if (!is_null($obj)) {
            $result[] = $obj;
            if (!is_null($obj->allparents)) {
                $result = array_merge($result, $this->getBelongsToElements($obj->allparents));
            }

        }
        return $result;
    }

}