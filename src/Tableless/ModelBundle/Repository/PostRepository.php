<?php

namespace Tableless\ModelBundle\Repository;

/**
 * Description of PostRepository
 *
 * @author THIAGO
 */
use Doctrine\ORM\EntityRepository;
/**
  * Class PostRepository
*/
class PostRepository extends EntityRepository {

   /**
     * Get query builder
     *
     * @return \Doctrine\ORM\QueryBuilder
    */
    private function getQueryBuilder() {

        $em = $this->getEntityManager();

        $queryBuilder = $em->getRepository('TablelessModelBundle:Post')
                ->createQueryBuilder('p');

        return $queryBuilder;
    }

    public function findAllInOrder() {
        $qb = $this->getQueryBuilder()
                ->orderBy('p.createdAt', 'desc');

        return $qb->getQuery()->getResult();
    }

}
