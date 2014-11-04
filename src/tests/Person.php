<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 11/4/14
 * Time: 12:22 PM
 */

class Person
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
} 