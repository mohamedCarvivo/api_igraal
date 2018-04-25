<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commission;
use AppBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class UserController extends  FOSRestController
{

    /**
     * @param User $user
     *
     * @REST\Post(
     *     name="api_user_create",
     *     path="user/register"
     * )
     * @Rest\View()
     * @ParamConverter("user", converter="fos_rest.request_body")
     *
     */
    public function postUserAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();

        $em->persist($user);
        $em->flush();

        return $this->view($user, Response::HTTP_CREATED, ['Location' => $this->generateUrl('api_user_get', ['userId' => $user->getId()])]);
    }

    /**
     * @param User $user
     *
     * @REST\Get(
     *     name="api_user_get",
     *     path="user/{userId}",
     *     requirements={"userId"="\d+"}
     * )
     * @Rest\View()
     * @ParamConverter("user", class="AppBundle:User",options={"mapping"={"userId":"id"}})
     *
     */
    public function gettUserAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();

        $result =[
            "user"=>$user,
            "nbCommissions"=>$em->getRepository(Commission::class)->getNbCommissions($user)
        ];

        return $this->view($result, Response::HTTP_OK);
    }
}
