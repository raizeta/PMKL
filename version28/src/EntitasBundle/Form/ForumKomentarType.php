<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
class ForumKomentarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('isiKomentar',TextareaType::class,['attr'=>['class'=>'form-control','placeholder'=>'Judul Content','required'=>true] ])
        ->add('komentator',null,['attr'=>['class'=>'form-control'],'property'=>'username','placeholder'=>'Comentator','required'=>true])
        ->add('forumContent',null,['attr'=>['class'=>'form-control'],'property'=>'judulContent','placeholder'=>'Content Authors','required'=>true]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\ForumKomentar'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_forumkomentar';
    }


}
