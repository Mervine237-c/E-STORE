<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as mervie;

/**
 * @mervie\Entity()
 * @mervie\Table()
 */
class Panier
{
    /**
     * @mervie\Id
     * @mervie\GeneratedValue
     * @mervie\Column(type="integer")
     */
    private  $id;


    /**
     * @mervie\ManyToOne(targetEntity="MyApp\EstoreBundle\Entity\Achat")
     * @mervie\JoinColumn(name="id_compte",referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    public  $id_achat;

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
    public function getIdAchat()
    {
        return $this->id_achat;
    }

    /**
     * @param mixed $id_achat
     */
    public function setIdAchat($id_achat)
    {
        $this->id_achat = $id_achat;
    }










}