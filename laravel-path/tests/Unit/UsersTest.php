<?php

function sum(int $a, int $b)
{
    return $a + $b;
}

it('sum', function ($a, $b, $result) {
    expect(sum($a, $b))->toBe($result);
})
    // ->with([
    //     '1 + 1 = 2' => [1, 1, 2],
    //     '3 + 2 = 5' => [3, 2, 5],
    //     '70 + 90 = 160' => [70, 90, 160],
    // ])
    ->with('additions');

dataset('additions', [
    '1 + 1 = 2' => [1, 1, 2],
    '3 + 2 = 5' => [3, 2, 5],
    '70 + 90 = 160' => [70, 90, 160],
]);
