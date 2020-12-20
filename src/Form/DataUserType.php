<?php
namespace App\Form;
use App\Entity\DataUser;
use App\Entity\Province;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DataUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sex', ChoiceType::class, [
                'label' => 'Soy',
                'choices' => [
                    'Hombre' => 'hombre',
                    'Mujer' => 'mujer',
                ],
                'attr' => [
                     'class' => 'class_form_data'
                 ]
            ])
           ->add('province', EntityType::class,[
               'label' => 'Elige Tu provincia',
               'class' => Province::class,
               'choice_label' => 'name',
               'attr' => [
                   'placeholder' => 'Introduzca Tu provincia', 'class' => 'class_form_data'
                ]
           ])
            ->add('name', TextType::class,[
                'label' => 'Nombre Usuario, descripción corta',
                'attr' => [
                    'class' => 'class_form_data', 'placeholder' => 'Nombre, morenaza con pechos grandes, completo'
                ]
            ])
             ->add('nacion' , TextType::class ,[
                    'label' => 'Nacionalidad',
                    'attr' => [
                        'class' => 'class_form_data', 'placeholder' => 'Nacionalidad',
                    ]
                ])
            ->add('town' , TextType::class ,[
                'label' => 'Cuidad',
                'attr' => [
                    'class' => 'class_form_data', 'placeholder' => 'Cuidad',
                ]
            ])
            ->add('age' , TextType::class ,[
                'label' => 'Edad',
                'attr' => [
                    'class' => 'class_form_data', 'placeholder' => '00',
                ]
            ])
            ->add('price', TextType::class, [
                'label' => 'Precio',
                'attr' => [
                    'class' => 'class_form_data', 'placeholder' => '00 €'
                ]
            ])
            ->add('image', FileType::class, ['label' => 'Seleccione la imagen principal', 'mapped' => false, 'required' => false,])
            ->add('tlf' , TextType::class, [
                'label' => 'Telefono',
                'attr' => [
                    'class' => 'class_form_data', 'placeholder' => '612345678']
                ])
            ->add('sobremi', TextareaType::class,[
                'label' => 'Sobre mi',
                'attr' => ['class' => 'textareaclass', 'placeholder' => '...']
            ])
            ->add('Guardar', SubmitType::class, [
                'attr' => [
                    'class' => 'button_form_data',]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DataUser::class,
        ]);
    }
}
