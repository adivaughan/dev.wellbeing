<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class GroupTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('name')
          ->add('description', null, array(
            'attr' => array('rows' => '15'),
          ))
          ->add('frequency')
          ->add('active')
          ;
    }

    #binds form to entity class
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\GroupType'
        ]);
    }
}