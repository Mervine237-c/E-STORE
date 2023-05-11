<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as mervine;
/**
 * @mervine\Entity(repositoryClass="MyApp\EstoreBundle\Repository\VoitureRepository")
 * @mervine\Table()
 */
class Categorie
{
    /**
     * @mervine\Id
     * @mervine\GeneratedValue
     * @mervine\Column(type="integer")
     */
    private  $id;


    /**
     * @mervine\Column(type="string",length=500)
     */

    private $nom;

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function __toString()
    {
        return $this->nom;
    }


}