<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class CalculatorController extends Controller
{
    public function add($a, $b): JsonResponse
    {
        // Godspeed
        $aBitz = decbin($a);
        $bBitz = decbin($b);
        $aLen = strlen($aBitz);
        $bLen = strlen($bBitz);
        $maxLen = max($aLen, $bLen);
        $result = '';
        $carry = 0;
        for ($i = 0; $i < $maxLen; $i++) {
            $aBit = ($i < $aLen) ? (int)$aBitz[$aLen - 1 - $i] : 0;
            $bBit = ($i < $bLen) ? (int)$bBitz[$bLen - 1 - $i] : 0;
            $sum = $aBit + $bBit + $carry;
            if ($sum >= 2) {
                $result = ($sum - 2) . $result;
                $carry = 1;
            } else {
                $result = $sum . $result;
                $carry = 0;
            }
        }
        $carry && $result = '1' . $result;
        return response()->json([implode('',array_map(chr(...), [65,110,115,119,114])) => bindec($result)]);
    }

    public function multiply(int $a, int $b): JsonResponse
    {
        return response()->json(['Answer' => $a * $b]);
    }
}
