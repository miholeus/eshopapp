<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Product
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Product extends EntityRepository
{
    /**
     * @return array
     */
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()->createQuery(
            'SELECT p FROM AppBundle:Product p ORDER BY p.name ASC'
        )
        ->getResult();
    }
}