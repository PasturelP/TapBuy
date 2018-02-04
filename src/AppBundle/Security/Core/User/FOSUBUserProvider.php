<?php

namespace AppBundle\Security\Core\User;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider as BaseClass;
use Symfony\Component\Security\Core\User\UserInterface;

class FOSUBUserProvider extends BaseClass
{
	/**
	 * {@inheritDoc}
	 */
	public function connect(UserInterface $user, UserResponseInterface $response)
	{
		$property = $this->getProperty($response);
		$username = $response->getUsername();

		$service = $response->getResourceOwner()->getName();
		$setter = 'set' . ucfirst($service);
		$setter_id = $setter . 'Id';
		$setter_token = $setter . 'AccessToken';

		if (null !== $previousUser = $this->userManager->findUserBy([$property => $username])) {
			$previousUser->$setter_id(null);
			$previousUser->$setter_token(null);
			$this->userManager->updateUser($previousUser);
		}

		$user->$setter_id($username);
		$user->$setter_token($response->getAccessToken());
		$this->userManager->updateUser($user);
	}

	/**
	 * {@inheritdoc}
	 */
	public function loadUserByOAuthUserResponse(UserResponseInterface $response)
	{
		$user = $this->userManager->findUserBy([$this->getProperty($response) => $response->getUsername()]);
		$user_email = $this->userManager->findUserBy(['email' => $response->getEmail()]);
		if (null === $user) {
			$service = $response->getResourceOwner()->getName();
			$setter = 'set' . ucfirst($service);
			$setter_id = $setter . 'Id';
			$setter_token = $setter . 'AccessToken';

			if($user_email === null)
			{
				$user = $this->userManager->createUser();
				$user->setUsername($response->getFirstName() . ' ' . $response->getLastName());
				$user->setEmail($response->getEmail());
				$user->setPassword($response->getUsername());
			}
			else
			{
				$user = $user_email;
			}
			$user->$setter_id($response->getUsername());
			$user->$setter_token($response->getAccessToken());


			$user->setEnabled(true);
			$this->userManager->updateUser($user);
			return $user;
		}

		$user = parent::loadUserByOAuthUserResponse($response);
		$serviceName = $response->getResourceOwner()->getName();
		$setter = 'set' . ucfirst($serviceName) . 'AccessToken';

		$user->$setter($response->getAccessToken());
		return $user;
	}
}