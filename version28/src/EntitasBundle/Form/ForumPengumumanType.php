<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class ForumPengumumanType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('judulPengumuman',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Judul Pengumuman','required'=>true] ])
        ->add('topikPengumuman',CKEditorType::class,array('config_name' => 'my_config','attr'=>['required'=>true]))
        ->add('isiPengumuman',CKEditorType::class,array('config_name' => 'my_config','attr'=>['required'=>true]))
        ->add('waktuDiadakan', DateType::class,['widget' => 'single_text','attr'=>['class'=>'form-control']])
        ->add('tempatDiadakan',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Tempat Dilaksanakan','required'=>true] ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\ForumPengumuman'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_forumpengumuman';
    }


}
