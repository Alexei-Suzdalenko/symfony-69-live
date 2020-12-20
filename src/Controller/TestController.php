<?php

namespace App\Controller;

use App\Test\TestClass;
use App\Test\TestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\DependencyInjection\Loader\Configurator\expr;

class TestController extends AbstractController
{
    private $ti;
    public function __construct(TestInterface $ti)
    {
        $this->ti = $ti;
    }

    /**
     * @Route("/test", name="test")
     */
    public function index()
    {

       return $this->render('test/index.html.twig', [
           'controller_name' => 'TestController',
       ]);
    }

}
