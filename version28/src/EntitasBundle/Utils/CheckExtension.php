<?php
namespace EntitasBundle\Utils;

class CheckExtension extends \Twig_Extension
{
    public function getFunctions() {
        return array(
            'isDateTime' => new \Twig_Function_Method($this, 'isDateTime'),
        );
    }

    public function isDateTime($date) {
        return ($date instanceof \DateTime); /* edit */
    }

    public function getName()
    {
        return 'acme_check_extension';
    }
}