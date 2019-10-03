<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class GroupEventForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('grouptype', null, array ('label' => 'Course Topic'))
          ->add('venue', null, array ('label' => 'Venue'))
          ->add('date', DateTimeType::class, array(
            'placeholder' => array(
                'day' => 'Day','month' => 'Month', 'year' => 'Year', 
                'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
            )
        ))
          ->add('active', null, array ('label' => 'Active'))
          ;
    }

    #binds form to entity class
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\GroupEvent'
        ]);
    }
}




