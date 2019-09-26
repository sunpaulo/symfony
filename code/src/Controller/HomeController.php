<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index(): Response
    {
        return $this->render('welcome.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home(AuthenticationUtils $utils): Response
    {
        return $this->render('user/home.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
}
