<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationEventForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('firstname', null, array ('label' => 'First name', 'required' => true,))
          ->add('lastname', null, array ('label' => 'Last name', 'required' => true,))
          ->add('gender', ChoiceType::class, array(
              'label' => 'Gender',
              'required' => true,
              'placeholder' => 'select gender',
              'choices' => array(
                'Male' => 'Male',
                'Female' => 'Female',
                'Other' => 'Other'),            
              ))
          ->add('dateofbirth', DateType::class, array (
              'label' => 'Date of birth',
              'required' => true,
              'years' => range(2018,1900),
              ))
          ->add('contactnumber', null, array ('label' => 'Contact number', 'required' => true,))
          ->add('emailaddress', null, array ('label' => 'Email address', 'required' => true,))
          ->add('homeaddress', null, array ('label' => 'Home address','required' => true,))
          ->add('postcode', null, array ('label' => 'Postcode', 'required' => true,))
          ;
    }

    #binds form to entity class
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\RegistrationEvent'
        ]);
    }
}