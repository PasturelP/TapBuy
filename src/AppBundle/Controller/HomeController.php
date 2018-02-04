<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
	/**
	 * @Route("/", name="_home_home")
	 */
	public function homeAction()
	{
		return $this->render('page/home/home.html.twig', [
			'user' => $this->getUser()
		]);
	}
}