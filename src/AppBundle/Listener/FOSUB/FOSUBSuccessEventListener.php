<?php

namespace AppBundle\Listener\FOSUB;


use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class FOSUBSuccessEventListener implements EventSubscriberInterface
{
	private $router;

	public function __construct(UrlGeneratorInterface $router)
	{
		$this->router = $router;
	}

	public static function getSubscribedEvents()
	{
		return [
			FOSUserEvents::RESETTING_RESET_SUCCESS => 'homeRedirection',
			FOSUserEvents::PROFILE_EDIT_SUCCESS => 'homeRedirection'
		];
	}

	public function homeRedirection(FormEvent $event)
	{
		$url = $this->router->generate('_home_home');
		$event->setResponse(new RedirectResponse($url));
	}


}