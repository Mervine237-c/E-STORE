<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as mervie;

/**
 * @mervie\Entity()
 * @mervie\Table()
 */
class Achat
{
    /**
     * @mervie\Id
     * @mervie\GeneratedValue
     * @mervie\Column(type="integer")
     */
    private  $id;

    /**
     * @mervie\ManyToOne(targetEntity="MyApp\EstoreBundle\Entity\Banque")
     * @mervie\JoinColumn(name="id_banque",referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    public  $id_banque;


    /**
     * @mervie\ManyToOne(targetEntity="MyApp\EstoreBundle\Entity\Voiture")
     * @mervie\JoinColumn(name="id_voiture",referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    public  $id_voiture;

    /**
     * @mervie\Column(type="datetime",nullable=true)
     */
    public  $date;

    /**
     * @param $id
     */
    public function __construct()
    {
        $this->date = new  \DateTime('now');
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
    public function getIdBanque()
    {
        return $this->id_banque;
    }

    /**
     * @param mixed $id_banque
     */
    public function setIdBanque($id_banque)
    {
        $this->id_banque = $id_banque;
    }

    /**
     * @return mixed
     */
    public function getIdVoiture()
    {
        return $this->id_voiture;
    }

    /**
     * @param mixed $id_voiture
     */
    public function setIdVoiture($id_voiture)
    {
        $this->id_voiture = $id_voiture;
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