<?php
// https://leetcode.com/problems/maximum-score-words-formed-by-letters/

class Solution {

    /**
     * @param String[] $words
     * @param String[] $letters
     * @param Integer[] $score
     * @return Integer
     */
    function maxScoreWords($words, $letters, $score) {
        $voc = array_combine(range('a','z'), $score);
        $max = 0;

        $combine = [];
        /*foreach($words as $v1){
            foreach($words as $v2){
                $combine[] = $v1.'.'.$v2;
            }
        }*/

        $this->combine($words, $combine);

        print_r($combine); exit();

        foreach ($combine as $word) {
            $word_max = 0;
            $_letters = $letters;
            foreach (str_split($word) as $w) {
                $l = array_search($w, $_letters);
                if ($l !== false) {
                    $word_max += $voc[$w];
                    unset($_letters[$l]);
                }
            }

            if ($word_max > $max) {
                $max = $word_max;
            }
        }

        return $max;
    }

    function combine($items, &$out, $perms = array())
    {
        if (empty($items)) {
            $out[] = implode('', $perms);
        } else {
            for ($i = count($items) - 1; $i >= 0; --$i) {
                $newitems = $items;
                $newperms = $perms;
                list($foo) = array_splice($newitems, $i, 1);
                array_unshift($newperms, $foo);
                $this->combine($newitems, $out, $newperms);
            }
        }

    }

}

$obj = new Solution();
print_r($obj->maxScoreWords(
    ["xxxz","ax","bx","cx"],
    //['a', 'b', 'c', 'd'],
    ["z","a","b","c","x","x","x"],
    [4,4,4,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,5,0,10]
));

/*$let = ["a","a","c","d","d","d","g","o","o"];

var_dump(array_search('z', $let));*/