<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class MainController extends AbstractController
{
    
    public function index()
    {
        return $this->render('main/dashboard.html.twig', [
        ]);
    }
}