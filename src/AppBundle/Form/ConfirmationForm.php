<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfirmationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('confirmation', ChoiceType::class, array(
            'choices'  => array(
                  'Yes' => true,
                  'No' => false,
                ),
            'expanded' => true,
            'label' => false,
          ));
    }
}
