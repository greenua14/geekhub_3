<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 11/1/14
 * Time: 7:55 PM
 */

namespace mvc\Controller;


use mvc\Model\IndexModel;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function indexAction()
    {
        $indexModel = new IndexModel();
        $data = $indexModel->getData();
        $var = 'Controller variable text';

        return new Response($this->twig->render('index/index.html.twig', array('var' => $var, 'data' => $data)) . 'It\'s controller text');
    }

    public function aboutAction()
    {
        $indexModel = new IndexModel();
        $about = $indexModel->getAbout();

        return new Response($this->twig->render('index/about.html.twig', array('about' => $about)));
    }
}