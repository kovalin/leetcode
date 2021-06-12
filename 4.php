<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        return $this->median(array_merge($nums1, $nums2));
    }

    function median ($arr) {
        sort ($arr);
        $count = count($arr);
        $middle = floor($count/2);
        if ($count%2) return $arr[$middle];
        else return ($arr[$middle-1]+$arr[$middle])/2;
    }
}

$obj = new Solution();
print_r($obj->findMedianSortedArrays([2], []));