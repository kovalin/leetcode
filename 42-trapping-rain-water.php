<?php
class Solution {

    public $log = [];
    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $output = 0;
        $steps = 0;
        $step_after_max = 0;
        $max_val = 0;
        $min_val = 0;
        $max_pos=-1;
        for($i=0; $i<count($height);$i++) {
            $val = $height[$i];
            if ($val >= $max_val) {
                $max_val = $val;
                $max_pos = $i;
                $steps = 0;
                $step_after_max = 0;
                $this->log[] = 'Set max_pos='.$i;
            } elseif ($val < $max_val) {
                $output += $max_val-$val;
                $steps++;
                if ($max_pos > -1) {
                    $step_after_max += $max_val-$val;
                }
                if ($min_val < $max_val && $val > $min_val) {
                    $min_val = $val;
                }
                $this->log[] = $i.' +'.$max_val-$val;
            }
            if ($i == count($height)-1 && $steps != 0) {
                $i = $max_pos;
                $max_val=0;
                $steps=0;
                $output -= $step_after_max;
                $this->log[] = '-'.$i.' Go to'.$max_pos.' and -'.$step_after_max;
            }
        }

        return $output;
    }
}

$obj = new Solution;

echo $obj->trap([4,2,3]); // 1
//echo $obj->trap([0,1,0,2,1,0,1,3,2,1,2,1]); // 6
//echo $obj->trap([4,2,0,3,2,5]); //9

print_r($obj->log);