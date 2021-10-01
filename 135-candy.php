<?php
class Solution {

    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy($ratings) {
        $candy = array_fill(0, count($ratings), 1);

        for ($i=0; $i<=count($ratings)-1; $i++) {
            if ($i < count($ratings)-1 && $ratings[$i] > $ratings[$i+1] && $candy[$i] <= $candy[$i+1]){
                $candy[$i] = $candy[$i+1]+1;
            }
            if ($i > 0 && $ratings[$i] > $ratings[$i-1] && $candy[$i] <= $candy[$i-1]){
                $candy[$i] = $candy[$i-1]+1;
            }
        }

        for ($i=count($ratings)-1; $i>=0; $i--) {
            if ($i > 0 && $ratings[$i] > $ratings[$i-1] && $candy[$i] <= $candy[$i-1]){
                $candy[$i] = $candy[$i-1]+1;
            }
            if ($i < count($ratings)-1 && $ratings[$i] > $ratings[$i+1] && $candy[$i] <= $candy[$i+1]){
                $candy[$i] = $candy[$i+1]+1;
            }
        }

        return array_sum($candy);
    }
}

$obj = new Solution;

echo $obj->candy([1,0,2]);