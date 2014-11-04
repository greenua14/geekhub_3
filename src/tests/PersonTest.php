<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 11/4/14
 * Time: 12:24 PM
 */

require_once("Person.php");

class PersonTest extends \PHPUnit_Framework_TestCase
{
    public $test;

    public function setUp()
    {
        $this->test = new Person('Green');
    }

    public function testName()
    {
        $name = $this->test->getName();
        $this->assertTrue($name == 'Green');
    }
} 