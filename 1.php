<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        foreach($nums as $i=>$n) {
            $_nums = $nums;
            unset($_nums[$i]);
            $s = array_search($target-$n, $_nums);
            if ($s !== false) {
                return [$i, $s];
            }
        }
        return false;
    }
}

$obj = new Solution();

print_r($obj->twoSum([3,2,4], 6));
