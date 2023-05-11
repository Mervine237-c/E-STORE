<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as mervie;

/**
 * @mervie\Entity()
 * @mervie\Table(name="Model")
 */
class Modele
{
    /**
     * @mervie\Id
     * @mervie\GeneratedValue
     * @mervie\Column(type="integer")
     */
    private  $id;
    /**
     * @mervie\Column(type="string",length=500)
     */

    private $serie;
    /**
     * @mervie\Column(type="string")
     */
    private $descritption;

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
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getDescritption()
    {
        return $this->descritption;
    }

    /**
     * @param mixed $descritption
     */
    public function setDescritption($descritption)
    {
        $this->descritption = $descritption;
    }



}