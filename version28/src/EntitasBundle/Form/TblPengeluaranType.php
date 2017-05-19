<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
class TblPengeluaranType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('namaPemakai',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Yang Menerima','required'=>true] ])
        ->add('namaPenyerah',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Yang Menyerahkan','required'=>true] ])
        ->add('jumlah','integer',['attr'=>['class'=>'form-control','placeholder'=>'Jumlah Yang Diserahkan','required'=>true] ])
        ->add('tanggalpenyerahan',DateType::class,['widget' => 'single_text','attr'=>['class'=>'form-control']])
        ->add('catatan',TextareaType::class,['attr'=>['class'=>'form-control','placeholder'=>'Keterangan','required'=>true] ])
        ->add('typePengeluaran', EntityType::class,['class' => 'EntitasBundle:FosTypepengeluaran','choice_label' => 'namaType','placeholder'=>'Type Pengeluaran','attr'=>['class'=>'form-control','required'=>true]]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\TblPengeluaran'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_tblpengeluaran';
    }


}
