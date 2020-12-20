<?php
namespace App\Test;

interface TestInterface
{

     const foo = 'bar';

    /**
     * @param string $value
     * @return string
     */
     public function fitstFunction( string $value) : string;
}