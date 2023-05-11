<?php

namespace MyApp\EstoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BanqueRepository extends  EntityRepository
{

    public function findBanqueByUserName($username){

        $requette = $this->getEntityManager()->createQuery("SELECT  b  FROM MyAppEstoreBundle:Banque b 
      JOIN  MyAppEstoreBundle:User u WITH u.id=b.id_compte  WHERE  u.username='$username' ");
        // $requette->execute();
        return  $requette->getResult();

    }

}