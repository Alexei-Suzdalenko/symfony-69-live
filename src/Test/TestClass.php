<?php
namespace App\Test;

class TestClass implements TestInterface {

    /**
     * @param $string
     * @return string
     */
    public function one($string): string
    {
        return $string;
    }

    /**
     * @param string $value
     * @return string
     */
    public function fitstFunction(string $value): string
    {
        return $value;
    }
}