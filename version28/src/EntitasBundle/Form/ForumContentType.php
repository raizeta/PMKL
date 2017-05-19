<?php

namespace EntitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
class ForumContentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('judulContent',TextType::class,['attr'=>['class'=>'form-control','placeholder'=>'Judul Content','required'=>true] ])
        ->add('summaryContent',CKEditorType::class,array('config_name' => 'my_config','attr'=>['required'=>true]))
        ->add('isiContent',CKEditorType::class,array('config_name' => 'my_config','attr'=>['required'=>true]))
        ->add('statusContent', EntityType::class,['class' => 'EntitasBundle:ForumStatus','choice_label' => 'namaStatus','placeholder'=>'Forum Status','attr'=>['class'=>'form-control','required'=>true]])
        ->add('authors',null,['attr'=>['class'=>'form-control'],'property'=>'username','placeholder'=>'Content Authors','required'=>true])
        // ->add('forumCategorys', EntityType::class,['class' => 'EntitasBundle:ForumCategory','choice_label' => 'namaCategory','placeholder'=>'Category Content','attr'=>['class'=>'form-control','required'=>true]])
        ->add('forumCategorys', EntityType::class,
            [
                'class' => 'EntitasBundle:ForumCategory',
                'query_builder' => function (EntityRepository $er) 
                {
                    return $er->createQueryBuilder('fc')
                              ->orderBy('fc.namaCategory', 'DESC');
                },
                'choice_label' => 'namaCategory',
                'placeholder'=>'Category Content',
                'attr'=>['class'=>'form-control','required'=>true]
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntitasBundle\Entity\ForumContent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitasbundle_forumcontent';
    }


}
