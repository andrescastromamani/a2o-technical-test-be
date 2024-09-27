<?php

namespace App\Services;
class StringValueService
{
    public function maxValue($input)
    {
        $inputLength = strlen($input);
        $response = $inputLength;
        $suffixArray = $this->generateSuffixArray($input, $inputLength);
        $lcpArray = $this->generateLcpArray($input, $suffixArray, $inputLength);
        $left = array_fill(0, $inputLength, -1);
        $right = array_fill(0, $inputLength, $inputLength);

        $s = [0];
        for ($i = 1; $i < $inputLength; $i++) {
            while (!empty($s) && $lcpArray[end($s)] >= $lcpArray[$i]) {
                array_pop($s);
            }
            if (!empty($s)) {
                $left[$i] = end($s);
            }
            $s[] = $i;
        }

        $s = [$inputLength - 1];
        for ($i = $inputLength - 2; $i >= 0; $i--) {
            while (!empty($s) && $lcpArray[end($s)] >= $lcpArray[$i]) {
                array_pop($s);
            }
            if (!empty($s)) {
                $right[$i] = end($s);
            }
            $s[] = $i;
        }

        for ($i = 0; $i < $inputLength; $i++) {
            $response = max($response, $lcpArray[$i] * ($right[$i] - $left[$i]));
        }
        return $response;
    }

    private function generateSuffixArray($input, $inputLength)
    {
        $suffixArray = [];
        for ($i = 0; $i < $inputLength; $i++) {
            $suffixArray[] = [$input[$i], $i];
        }

        $l = 0;
        while ($l < 2 * $inputLength) {
            usort($suffixArray, function ($a, $b) {
                return $a[0] <=> $b[0];
            });

            $last = $suffixArray[0][0];
            $rank = 0;
            $pos_map = array_fill(0, $inputLength, null);

            for ($i = 0; $i < $inputLength; $i++) {
                $pos_map[$suffixArray[$i][1]] = $i;
                if ($last != $suffixArray[$i][0]) {
                    $last = $suffixArray[$i][0];
                    $rank++;
                }
                $suffixArray[$i][0] = $rank;
            }

            $new_tuple = [];
            for ($i = 0; $i < $inputLength; $i++) {
                $nextIndex = $suffixArray[$i][1] + $l;
                $nextRank = ($nextIndex < $inputLength) ? $suffixArray[$pos_map[$nextIndex]][0] : -1;
                $new_tuple[] = [$suffixArray[$i][0], $nextRank];
            }

            for ($i = 0; $i < $inputLength; $i++) {
                $suffixArray[$i][0] = $new_tuple[$i];
            }
            $l = $l ? $l << 1 : 1;
        }

        $response = [];
        foreach ($suffixArray as $item) {
            $response[] = $item[1];
        }

        return $response;
    }

    private function generateLcpArray($input, $suffixArray, $inputLength)
    {
        $rank = array_fill(0, $inputLength, null);
        $lcp = array_fill(0, $inputLength, 0);
        $k = 0;

        for ($i = 0; $i < $inputLength; $i++) {
            $rank[$suffixArray[$i]] = $i;
        }

        for ($i = 0; $i < $inputLength; $i++) {
            if ($rank[$i] == $inputLength - 1) {
                $k = 0;
                continue;
            }

            $j = $suffixArray[$rank[$i] + 1];

            // Ensure bounds check while comparing characters
            while ($i + $k < $inputLength && $j + $k < $inputLength && $input[$i + $k] == $input[$j + $k]) {
                $k++;
            }

            $lcp[$rank[$i]] = $k;
            $k = max(0, $k - 1);
        }
        return $lcp;
    }
}
