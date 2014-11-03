<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 11/3/14
 * Time: 10:26 AM
 */

namespace mvc\Model;


class TestModel
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }
} 