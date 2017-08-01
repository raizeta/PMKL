<?php
namespace UsersBundle\EventListener;

use FOS\OAuthServerBundle\Event\OAuthEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTInvalidEvent;
use Symfony\Component\HttpFoundation\JsonResponse;
class JWTInvalidListener
{
    /**
     * @param JWTInvalidEvent $event
     */
    public function onJWTInvalid(JWTInvalidEvent $event)
    {
        $data = [
            'status'  => '403 Forbidden',
            'message' => 'Your token is invalid, please login again to get a new one',
        ];

        $response = new JsonResponse($data, 403);

        $event->setResponse($response);
    }
}