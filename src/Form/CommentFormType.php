<?php

namespace App\Form;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', null, [
                'row_attr' => ['class' => 'mb-4'],
                'label' => 'Name',
                'label_attr' => ['class' => 'block text-xs text-indigo-500 mb-1'],
                'attr' => [
                    'class' => 'px-4 py-2',
                    'placeholder' => 'name...'
                    ]
            ])
            ->add('email', EmailType::class, [
                'row_attr' => ['class' => 'mb-4'],
                'label' => 'Email',
                'label_attr' => ['class' => 'block text-xs text-indigo-500 mb-1'],
                'attr' => [
                    'class' => 'px-4 py-2',
                    'placeholder' => 'email address...'
                    ]
            ])
            ->add('text', TextareaType::class, [
                'row_attr' => ['class' => 'mb-4'],
                'label' => 'Feedback',
                'label_attr' => ['class' => 'block text-xs text-indigo-500 mb-1'],
                'attr' => [
                    'class' => 'px-4 py-2',
                    ]
            ])
            ->add('photo', FileType::class, [
                'required'    => false,
                'mapped'      => false,
                'constraints' => [
                    new Image(['maxSize' => '1024k'])
                ],
                'row_attr' => ['class' => 'mb-4'],
                'label' => 'Conference photo',
                'label_attr' => ['class' => 'block text-xs text-indigo-500 mb-1'],
                'attr' => [
                    'class' => 'px-4 py-2 bg-white',
                    ]
            ])
            ->add('Save', SubmitType::class, [
                'attr' => ['class' => 'px-4 py-2 bg-indigo-500 text-white']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
