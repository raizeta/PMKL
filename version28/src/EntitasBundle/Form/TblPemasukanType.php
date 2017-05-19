<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class TblPemasukanType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('catatan',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Penyetor','required'=>true] ])
        ->add('jumlahPemasukan','integer',['attr'=>['class'=>'form-control','placeholder'=>'Jumlah Pemasukan','required'=>true] ])
        ->add('donatur',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Donatur'] ])
        ->add('diterimaOleh',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Panitia Penerima','required'=>true] ])
        ->add('diterimaTanggal',DateType::class,['widget' => 'single_text','attr'=>['class'=>'form-control']])
        ->add('typePemasukan', EntityType::class,['class' => 'EntitasBundle:FosTypepemasukan','choice_label' => 'namaType','placeholder'=>'Type Pemasukan','attr'=>['class'=>'form-control','required'=>true]]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\TblPemasukan'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_tblpemasukan';
    }


}
