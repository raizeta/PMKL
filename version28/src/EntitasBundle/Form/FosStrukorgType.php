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
        ->add('namaJabatan',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Nama Jabatan','required'=>true] ])
        ->add('iconPejabat',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Icon Jabatan','required'=>true] ])
        ->add('namaKegiatan',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Nama Kegiatan','required'=>true] ])
        // ->add('parentJabatan')
        ->add('parentJabatan',null,['attr'=>['class'=>'form-control'],'property'=>'namaJabatan','placeholder'=>'Atasan','required'=>true])
        ->add('pjJabatan',null,['attr'=>['class'=>'form-control'],'property'=>'namaLengkap','placeholder'=>'Yang Menjabat','required'=>true]);
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
