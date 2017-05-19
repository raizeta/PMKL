<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
class FosLogoorgType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('namaLogo',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Nama Logo','required'=>true] ])
        ->add('deskripsiLogo',TextareaType::class,['attr'=>['class'=>'form-control','placeholder'=>'Deskripsi Logo','required'=>true] ])
        ->add('imageFile', 'vich_file', array('required'=> false,'allow_delete'  => true, 'download_link' => true));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\FosLogoorg'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_foslogoorg';
    }


}
