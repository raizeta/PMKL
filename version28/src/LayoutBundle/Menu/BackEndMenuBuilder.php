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
        
        $menu->addChild('Master Data',array('label'=>'Master Data'))
             ->setAttribute('dropdown',true)
             ->setAttribute('icon','fa fa-umbrella')
             ->setAttribute('class','treeview');

        $menu['Master Data']->addChild('Logo',array('route'=>'foslogoorg_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();

        $menu['Master Data']->addChild('Profile Organisasi',array('route'=>'fosprofileorg_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();

        $menu['Master Data']->addChild('Anggota Organisasi',array('route'=>'fosprofile_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();  
        $menu['Master Data']->addChild('Struktur Organisasi',array('route'=>'fosstrukorg_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();
        $menu['Master Data']->addChild('Type Kelamin',array('route'=>'foskelamin_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();
        $menu['Master Data']->addChild('Type Anggota',array('route'=>'fostypeanggota_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();   
        $menu['Master Data']->addChild('Type Jabatan',array('route'=>'fostypejabatan_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();         
        $menu['Master Data']->addChild('Type Pemasukan',array('route'=>'fostypepemasukan_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();
        $menu['Master Data']->addChild('Type Pengeluaran',array('route'=>'fostypepengeluaran_index'))
                       ->setAttribute('icon', 'fa fa-circle-o')->getParent();
        // $menu->addChild('Keanggotaan',array('label'=>'Keanggotaan'))
        //      ->setAttribute('dropdown',true)
        //      ->setAttribute('icon','fa fa-university')
        //      ->setAttribute('class','treeview');

        // $menu['Keanggotaan']->addChild('Active',array('route'=>'foskelamin_index'))
        //                ->setAttribute('icon', 'fa fa-circle-o')->getParent();

        // $menu['Keanggotaan']->addChild('Non-Active',array('route'=>'foskelamin_index'))
        //                ->setAttribute('icon', 'fa fa-circle-o')->getParent();

        // $menu['Keanggotaan']->addChild('Alumni',array('route'=>'foskelamin_index'))
        //                ->setAttribute('icon', 'fa fa-circle-o')->getParent();

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