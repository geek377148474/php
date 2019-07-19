<?php

$pipe1 = function ($poster, Closure $next) {
    $poster += 1;
    echo "pipe1: $poster\n";
    return $next($poster);
};

$pipe2 = function ($poster, Closure $next) {
    if ($poster > 7) {
        return $poster;
    }

    $poster += 3;
    echo "pipe2: $poster\n";
    return $next($poster);
};

$pipe3 = function ($poster, Closure $next) {
    $result = $next($poster);
    echo "pipe3: $result\n";
    return $result * 2;
};

$pipe4 = function ($poster, Closure $next) {
    $poster += 2;
    echo "pipe4 : $poster\n";
    return $next($poster);
};

$pipes = [$pipe1, $pipe2, $pipe3, $pipe4];

function dispatcher($poster, $pipes)
{
    echo "result: " . (new Pipeline)->send($poster)->through($pipes)->then(function ($poster) {
        echo "received: $poster\n";
        return 3;
    }) . "\n";
}

echo "==> action 1:\n";
dispatcher(5, $pipes);
echo "==> action 2:\n";
dispatcher(7, $pipes);
