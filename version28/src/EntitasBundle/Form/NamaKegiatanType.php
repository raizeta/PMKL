<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
class NamaKegiatanType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nama',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Nama Kegiatan','required'=>true] ])
        ->add('catatan',TextareaType::class,['attr'=>['class'=>'form-control','placeholder'=>'Catatan Kegiatan','required'=>true] ])
        ->add('startPeriode',DateType::class,['widget' =>'single_text','attr'=>['class'=>'form-control']])
        ->add('endPeriode',DateType::class,['widget' => 'single_text','attr'=>['class'=>'form-control']]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\NamaKegiatan'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_namakegiatan';
    }


}
