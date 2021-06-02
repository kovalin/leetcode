<?php


class Solution {

    /**
     * @param String $boxes
     * @return Integer[]
     */
    function minOperations($boxes) {
        //if (empty($boxes)) return [0];

        $boxes = str_split($boxes);
        $answer = [];
        foreach ($boxes as $key=>$box) {
            $answer[$key]  = 0;
            foreach ($boxes as $k=>$b) {
                if ($b == 1) {
                    $answer[$key] += abs($key - $k);
                }
            }
        }

        return $answer;
    }
}


$obj = new Solution();

print_r($obj->minOperations('0'));

