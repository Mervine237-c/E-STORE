<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as lui;
/**
 * @lui\Entity(repositoryClass="MyApp\EstoreBundle\Repository\VoitureRepository")
 * @lui\Table()
 */
class magasin
{
    /**
    @lui\Id
* @lui\GeneratedValue
* @lui\Column(type="integer")
     */

    private  $id;

    /**
     * @lui\Column(type="string",length=500,nullable=true)
     */
    private $Nom;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom): void
    {
        $this->Nom = $Nom;
    }


}