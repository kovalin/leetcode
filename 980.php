<?php
// 980. Unique Paths III
// https://leetcode.com/problems/unique-paths-iii/

class Solution
{

    public $log = [];

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function uniquePathsIII($grid)
    {
        $x1 = $y1 = $x2 = $y2 = [];
        $zero = 0;
        foreach ($grid as $i => $row) {
            foreach ($row as $j => $val) {
                if ($val == 0) {
                    $zero++;
                }
                if ($val == 1) {
                    $x1 = $i;
                    $y1 = $j;
                }
                if ($val == 2) {
                    $x2 = $i;
                    $y2 = $j;
                }
            }
        }

        return $this->find($x1, $y1, $x2, $y2, $zero, $grid, 0, '');
    }

    function find($x1, $y1, $x2, $y2, $zero, $grid, $steps, $history)
    {
        if ($x1 < 0 || $y1 < 0 || $x1 == count($grid) || $y1 == count($grid[0]) || $grid[$x1][$y1] == -1) {
            return 0;
        }

        if ($x1 == $x2 && $y1 == $y2) {
            if ($steps-1 == $zero) {

                // Log
                $history .= '('.$x1.','.$y1.')!';
                $this->log[] = $history;
                return 1;
            }
            return 0;
        }

        $steps++;
        $grid[$x1][$y1] = -1;

        // Log
        $history .= '('.$x1.','.$y1.'),';

        $g_r = $this->find($x1 + 1, $y1, $x2, $y2, $zero, $grid, $steps, $history);
        $g_d = $this->find($x1, $y1 + 1, $x2, $y2, $zero, $grid, $steps, $history);
        $g_l = $this->find($x1 - 1, $y1, $x2, $y2, $zero, $grid, $steps, $history);
        $g_u = $this->find($x1, $y1 - 1, $x2, $y2, $zero, $grid, $steps, $history);

        return $g_r + $g_d + $g_l + $g_u;
    }
}


$obj = new Solution();
print_r($obj->uniquePathsIII([[1,0,0,0],[0,0,0,0],[0,0,0,2]]));