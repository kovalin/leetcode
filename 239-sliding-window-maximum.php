<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k) {
        $output = [];
        foreach ($nums as $i=>$val) {
            if (($i + $k) > count($nums)) {
                break;
            }
            $output[] = max(array_slice($nums, $i, $k));
        }

        return $output;
    }

}

$obj = new Solution;
print_r($obj->maxSlidingWindow([1,3,-1,-3,5,3,6,7], 3));


