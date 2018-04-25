<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class CommissionRepository extends EntityRepository
{

    public function getNbCommissions(User $user)
    {
        return $this->createQueryBuilder('c')
                    ->select('COUNT(c)')
                    ->where('c.iduser = :iduser')
                    ->setParameter('iduser', $user)
                    ->getQuery()
                    ->getSingleScalarResult()
            ;
    }

}