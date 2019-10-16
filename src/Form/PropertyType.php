<?php

namespace App\Form;

use App\Entity\Property;
use App\Entity\TypeProperty;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adress', TextType::class, [
                'required' => true,
                'label' => "Adresse",
            ])
            ->add('rooms', IntegerType::class, [
                'required' => true,
                'label' => "Chambres",
            ])
            ->add('surface', NumberType::class, [
                'required' => true,
                'label' => "Surface m²",
            ])
            ->add('type', EntityType::class, [
                'class' => TypeProperty::class,
                'choice_label' => 'type',
                'required' => true,
                'label' => "Type",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
