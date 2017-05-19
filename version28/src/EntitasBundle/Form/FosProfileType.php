<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
        ->add('tanggalLahir', DateType::class,['widget' => 'single_text','attr'=>['class'=>'form-control']])
        ->add('namaSma',TextType::class,['required'=>true,'attr'=>['class'=>'form-control','placeholder'=>'Nama Instansi'] ])
        ->add('jurusanSma',TextType::class,['required'=>true,'attr'=>['class'=>'form-control','placeholder'=>'Jurusan'] ])
        ->add('masukSma', DateType::class,['required'=>true,'widget' => 'single_text','attr'=>['class'=>'form-control']])
        ->add('lulusSma', DateType::class,['required'=>true,'widget' => 'single_text','attr'=>['class'=>'form-control']])
        ->add('jenisKelamin',null,['attr'=>['class'=>'form-control'],'property'=>'namaKelamin','placeholder'=>'Jenis Kelamin','required'=>true])
        ->add('alamatSekarang',TextareaType::class,['attr'=>['class'=>'form-control','placeholder'=>'Alamat Lengkap','required'=>true] ])
        ->add('nomorHandphone',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'No Handphone','required'=>true] ])
        ->add('statusDisplay', ChoiceType::class,['choices'  => [1 => 'Yup',null => 'Tidak'],'attr'=>['class'=>'form-control','placeholder'=>'No Handphone','required'=>true]])
        ->add('imageFile', 'vich_file', array('required'=> false,'allow_delete'  => true, 'download_link' => true))
        ->add('typeAnggotas',null,['attr'=>['class'=>'form-control'],'property'=>'namaType','placeholder'=>'Status Keanggotaan','required'=>true])
        ->add('typePendidikan',null,['attr'=>['class'=>'form-control'],'property'=>'namaType','placeholder'=>'Type Pendidikan','required'=>true]);
        // ->add('typeAnggotas', EntityType::class,['class' => 'EntitasBundle:FosTypeanggota','choice_label' => 'namaType','placeholder'=>'Status Keanggotaan','attr'=>['class'=>'form-control','required'=>true]]);
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
