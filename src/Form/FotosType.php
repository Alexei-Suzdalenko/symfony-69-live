<?php

namespace App\Form;

use App\Entity\Fotos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FotosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', FileType::class, ['mapped' => false, 'required' => false, 'label' => 'Seleccionar las fotos' ])
            ->add('Guardar', SubmitType::class,[
                'attr' => [
                    'class' => 'save_fotos_class',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fotos::class,
        ]);
    }
}
