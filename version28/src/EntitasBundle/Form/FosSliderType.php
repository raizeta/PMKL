<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class FosSliderType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('judul',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Judul','required'=>true] ])
        ->add('summarySlider',TextareaType::class,['attr'=>['class'=>'form-control','placeholder'=>'Summary','required'=>true] ])
        ->add('contentSlider',TextareaType::class,['attr'=>['class'=>'form-control','placeholder'=>'Content','required'=>true] ])
        ->add('imageFile', 'vich_file', array('required'=> true,'allow_delete'  => true, 'download_link' => true));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\FosSlider'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_fosslider';
    }


}
