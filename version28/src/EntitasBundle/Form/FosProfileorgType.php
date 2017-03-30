<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
class FosProfileorgType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('judulContent',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Judul Content','required'=>true] ])
        ->add('slugContent',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Slug Content','required'=>true] ])
        ->add('summaryContent',CKEditorType::class,array('config_name' => 'my_config'))
        ->add('isiContent',CKEditorType::class,array('config_name' => 'my_config','attr'=>['required'=>true]))
        ->add('imageName',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Image Name','required'=>false] ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\FosProfileorg'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_fosprofileorg';
    }


}
