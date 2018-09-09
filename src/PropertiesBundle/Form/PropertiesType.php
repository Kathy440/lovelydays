<?php

namespace PropertiesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
//use PUGX\AutocompleterBundle\Form\Type\AutocompleteType;



class PropertiesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextareaType::class)
        ->add('location')// AutocompleteType::class, ['class' => Properties::class])
        ->add('pricing')
        ->add('rooms')
        ->add('maxGuests')
        ->add('submit', SubmitType::class); //instancie une classe de type subit;;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PropertiesBundle\Entity\Properties'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'propertiesbundle_properties';
    }


}
