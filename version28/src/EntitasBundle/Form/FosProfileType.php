<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
class FosProfileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('namaLengkap',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Nama Lengkap','required'=>true] ])
        ->add('tempatLahir',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Tempat Lahir','required'=>true] ])
        ->add('tanggalLahir')
        ->add('jenisKelamin',null,['attr'=>['class'=>'form-control'],'property'=>'namaKelamin','placeholder'=>'Jenis Kelamin','required'=>true])
        ->add('alamatSekarang',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Alamat Lengkap','required'=>true] ])
        ->add('nomorHandphone',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'No Handphone','required'=>true] ])
        ->add('statusDisplay')
        ->add('imageFile', 'vich_file', array('required'=> false,'allow_delete'  => true, 'download_link' => true))
        ->add('typeAnggotas',null,['attr'=>['class'=>'form-control'],'property'=>'namaType','placeholder'=>'Jenis Kelamin','required'=>true]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\FosProfile'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_fosprofile';
    }


}
