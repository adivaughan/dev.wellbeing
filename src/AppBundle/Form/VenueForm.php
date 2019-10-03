<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class VenueForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('venue', null, array ('label' => 'Venue'))
          ->add('location', null, array ('label' => 'Location'))
          ->add('postcode', null, array ('label' => 'Postcode'))
          ->add('busroutes', null, array ('label' => 'Bus routes'))
          ->add('trainstations', null, array ('label' => 'Trainstations'))
          ->add('sitenotes', null, array ('label' => 'Site notes (e.g. limited parking)'))     
          ->add('active', null, array ('label' => 'Active?'))
          ;
    }

    #binds form to entity class
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Venue'
        ]);
    }
}