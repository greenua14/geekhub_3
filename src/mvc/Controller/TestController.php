<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 11/2/14
 * Time: 4:10 PM
 */

namespace mvc\Controller;


use mvc\Model\TestModel;
use Symfony\Component\HttpFoundation\Response;

class TestController
{
    private $twig;

    public function __construct(\Twig_Environment $twig_Environment)
    {
        $this->twig = $twig_Environment;
    }

    public function indexAction()
    {
        $testModel = new TestModel('This is test model');

        $text = $testModel->getText();

        return new Response($this->twig->render('test/index.html.twig', array('text' => $text)));
    }

    public function addAction()
    {
        return new Response('Test Controller Add Action');
    }
} 