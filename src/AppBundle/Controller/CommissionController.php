<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commission;
use AppBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class CommissionController extends FOSRestController
{

    /**
     * @param User $user
     *
     * @REST\Get(
     *     name="api_Commission_list",
     *     path="commissions/{userId}",
     *     requirements={"userId"="\d+"}
     * )
     * @Rest\View()
     * @ParamConverter("user", class="AppBundle:User",options={"mapping"={"userId":"id"}})
     *
     */
    public function getCommissionAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();

        $commissions = $em->getRepository(Commission::class)->findByIduser($user);

        return $this->view($commissions, Response::HTTP_OK);
    }
}
