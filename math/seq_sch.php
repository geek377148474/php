<?php
//顺序查找（数组里查找某个元素）
function seq_sch(array $ListSeq, int $ListLength, int $keyData): int
{
    for ($i = 0; $i < $ListLength; $i++) {
        if ($ListSeq[$i] == $keyData) {
            return $i;
        }
        $i++;
    }

    return -1;
}

$range = (array) $createRange(0, 1000);
echo seq_sch($range, 1000, 1200);
