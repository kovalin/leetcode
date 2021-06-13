<?php
// https://leetcode.com/problems/reducing-dishes/

class Solution {

    /**
     * @param Integer[] $satisfaction
     * @return Integer
     */
    function maxSatisfaction($satisfaction) {
        sort($satisfaction);
        $sum = $out = 0;
        while ($satisfaction) {
            $el = array_pop($satisfaction);
            if ($el + $sum > 0) {
                $sum = $el + $sum;
                $out = $out + $sum;
            } else {
                break;
            }

        }
        return $out;
    }
}

$obj = new Solution();
echo $obj->maxSatisfaction([-2,5,-1,0,3,-3]);
//echo $obj->maxSatisfaction([-1,3,5]);
