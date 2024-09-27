<?php

namespace App\Services;

class ChessService
{
    public function queensAttack($n, $k, $r_q, $c_q, $obstacles)
    {
        if ($n == 0) {
            return 0;
        }

        $vset = array_map('serialize', $obstacles);
        $vset = array_unique($vset);

        if (in_array(serialize([$r_q, $c_q]), $vset)) {
            return 0;
        }

        $directions = [
            [1, 0], [-1, 0], [0, 1], [0, -1],
            [1, 1], [-1, -1], [1, -1], [-1, 1]
        ];

        $count = 0;

        foreach ($directions as $u_v) {
            $cur = [$r_q + $u_v[0], $c_q + $u_v[1]];

            while ($cur[0] >= 1 && $cur[0] <= $n && $cur[1] >= 1 && $cur[1] <= $n && !in_array(serialize($cur), $vset)) {
                $cur = [$cur[0] + $u_v[0], $cur[1] + $u_v[1]];
                $count++;
            }
        }
        return $count;
    }
}
