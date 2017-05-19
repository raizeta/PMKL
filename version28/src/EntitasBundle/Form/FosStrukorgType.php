<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class FosStrukorgType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // ->add('namaKegiatan',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Nama Kegiatan','required'=>true] ])
        ->add('namaKegiatan',null,['attr'=>['class'=>'form-control'],'property'=>'nama','placeholder'=>'Nama Kegiatan','required'=>true])
        ->add('pjJabatan',null,['attr'=>['class'=>'form-control'],'property'=>'namaLengkap','placeholder'=>'Nama Pejabat','required'=>true])
        ->add('typeJabatans',null,['attr'=>['class'=>'form-control'],'property'=>'namaType','placeholder'=>'Type Jabatan','required'=>true])
        ->add('parentTypejabatan',null,['attr'=>['class'=>'form-control'],'property'=>'namaJabatan','placeholder'=>'Atasan Jabatan']);
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\FosStrukorg'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_fosstrukorg';
    }


}
