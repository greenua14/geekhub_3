<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 11/3/14
 * Time: 11:17 AM
 */

namespace mvc\Model;


class IndexModel
{
    private $data;
    private $about;

    public function __construct()
    {
        $this->data = 'Some model data';
        $this->about = 'We combine industry expertise with innovative
            technology to deliver critical information to leading decision
            makers in the financial and risk, legal, tax and accounting,
            intellectual property and science and media markets, powered
            by the world\'s most trusted news organization.';
    }

    public function getData()
    {
        return $this->data;
    }

    public function getAbout()
    {
        return $this->about;
    }
} 