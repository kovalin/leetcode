<?php

class SubrectangleQueries {
    public $arr = [];
    /**
    * @param Integer[][] $rectangle
    */
    function __construct($rectangle) {
        $this->arr = $rectangle;
    }

    /**
    * @param Integer $row1
    * @param Integer $col1
    * @param Integer $row2
    * @param Integer $col2
    * @param Integer $newValue
    * @return NULL
    */
    function updateSubrectangle($row1, $col1, $row2, $col2, $newValue) {
        $r1 = $row1;
        $c1 = $col1;
        while ($r1 <= $row2){
            $c1 = $col1;
            while ($c1 <= $col2) {
                $this->arr[$r1][$c1] = $newValue;
                $c1++;
            }
            $r1++;
        }
    }

    /**
    * @param Integer $row
    * @param Integer $col
    * @return Integer
    */
    function getValue($row, $col) {
        return $this->arr[$row][$col];
    }
}