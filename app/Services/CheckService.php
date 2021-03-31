<?php

namespace App\Services;

class CheckService {
    /**
     * check the input and return corresponding string based on it. 
     *
     * @param int $input
     * @return string
     */
    public function check(int $input) { 
               
        $isDivisibleBy7 = $input % 7 == 0;
        $isDivisibleBy9 = $input % 9 == 0;

        if($isDivisibleBy7 && $isDivisibleBy9) {
            return 'EG';
        } else if($isDivisibleBy7) {
            return 'E';
        } else if($isDivisibleBy9) {
            return 'G';
        }

        // tyepcast to string unless FE require it as integer.
        // This will help them not putting a type cast at FE and save performance
        return strval($input);
    }
}