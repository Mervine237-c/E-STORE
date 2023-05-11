<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as mervine;
/**
 * @mervine\Entity(repositoryClass="MyApp\EstoreBundle\Repository\VoitureRepository")
 * @mervine\Table()
 */
class Commande
{

    /**
     * @mervine\Id
     * @mervine\GeneratedValue
     * @mervine\Column(type="integer")
     */
    private  $id;

    /**
     * @mervine\ManyToOne(targetEntity="MyApp\EstoreBundle\Entity\Produit")
     * @mervine\JoinColumn(name="id_sc",referencedColumnName="id",nullable=true)
     */
    public $produit;


    /**
     * @mervine\ManyToOne(targetEntity="MyApp\EstoreBundle\Entity\User")
     * @mervine\JoinColumn(name="id_user",referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    public  $user;

    /**
     * @mervine\Column(type="integer")
     */
    private  $nbr;

    /**
     * @mervine\Column(type="datetime")
     */
    private  $date;

    public function __construct()
    {
        $this->date = new \DateTime('now');
    }

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
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getNbr()
    {
        return $this->nbr;
    }

    /**
     * @param mixed $nbr
     */
    public function setNbr($nbr)
    {
        $this->nbr = $nbr;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}