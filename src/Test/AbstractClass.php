<?php
namespace App\Test;

abstract class AbstractClass {

    /**
     * @var $name
     * @param string
     */
    public $name;

    /**
     * AbstractClass constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param $string
     * @return string
     */
    abstract public function one($string) : string ;

}