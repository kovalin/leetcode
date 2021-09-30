<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumGap($nums) {
        if (count($nums) == 1) {
            return 0;
        }
        sort($nums);
        $max = 0;
        for ($i=1; $i<count($nums); $i++) {
            $_n = abs($nums[$i] - $nums[$i-1]);
            $max = ($_n > $max) ? $_n : $max;
        }
        return $max;
    }
}

$obj = new Solution;

echo $obj->maximumGap([3,6,10,1]);
?>