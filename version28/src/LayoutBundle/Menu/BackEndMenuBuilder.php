<?php
namespace LayoutBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\Entitymanager;

class BackEndMenuBuilder
{
     private $factory;
     private $em;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory,Entitymanager $em)
    {
        $this ->factory = $factory;
        $this->em = $em;

    }

    public function createBackEndMenu(RequestStack $requestStack)
    {
        $orderstatus  = $this->em->getRepository('EntitasBundle:FosKelamin')->findAll();

        $menu = $this->factory->createItem('root');

        $menu->setChildrenAttribute('class', 'sidebar-menu');
        
        $menu->addChild('Front End',array('route'=>'foskelamin_index'))
             ->setAttribute('icon','fa fa-umbrella');

        $menu->addChild('Keanggotaan',array('label'=>'Keanggotaan'))
             ->setAttribute('dropdown',true)
             ->setAttribute('icon','fa fa-university')
             ->setAttribute('class','treeview');

        $menu['Keanggotaan']->addChild('Active',array('route'=>'foskelamin_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();

        $menu['Keanggotaan']->addChild('Non-Active',array('route'=>'foskelamin_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();

        $menu['Keanggotaan']->addChild('Alumni',array('route'=>'foskelamin_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();

        $menu->addChild('Keuangan',array('label'=>'Keuangan'))
             ->setAttribute('dropdown',true)
             ->setAttribute('icon','fa fa-university')
             ->setAttribute('class','treeview');

        $menu['Keuangan']->addChild('Masuk',array('route'=>'foskelamin_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();

        $menu['Keuangan']->addChild('Keluar',array('route'=>'foskelamin_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();
        return $menu;
    }

}