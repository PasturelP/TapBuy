<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array                $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
	}

	/**
	 * @param OptionsResolver $resolver
	 * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
	 */
	public function configureOptions(OptionsResolver $resolver)
	{

		$resolver->setDefaults([
			'data_class' => User::class,
		]);
	}

	public function getParent()
	{
		return RegistrationFormType::class;
	}

	public function getBlockPrefix()
	{
		return 'app_user_registration';
	}

	public function getName()

	{
		return $this->getBlockPrefix();
	}
}
