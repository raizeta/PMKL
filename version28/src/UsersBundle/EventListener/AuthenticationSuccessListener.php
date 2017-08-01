<?php
namespace UsersBundle\EventListener;

use Symfony\Component\HttpFoundation\RequestStack;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\User\UserInterface;
class AuthenticationSuccessListener
{
    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof UserInterface) 
        {
            return;
        }

        // $data['token'] contains the JWT

        $data['data_profile'] = array(
                                'roles' => $user->getRoles(),
                                'username'=>$user->getUsername(),
                                'facebookID'=>$user->getFacebookID(),
                             );

        $event->setData($data);
    }
}