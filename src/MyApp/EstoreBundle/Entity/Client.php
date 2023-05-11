<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as mervine;
/**
 * @mervine\Entity(repositoryClass="MyApp\EstoreBundle\Repository\VoitureRepository")
 * @mervine\Table()
 */
class Client
{
    /**
     * @mervine\Id
     * @mervine\GeneratedValue
     * @mervine\Column(type="integer")
     */
    private  $id;

    /**
     * @mervine\OneToMany(targetEntity="MyApp\EstoreBundle\Entity\Produit", mappedBy="client")
     * @mervine\JoinColumn(name="id_p",referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    public  $produit;

    /**
     * @mervine\Column(type="string",length=500)
     */

    private $nom;

    /**
     * @mervine\Column(type="string",length=500)
     */
    private  $adress;
    /**
     * @mervine\Column(type="integer")
     */
    private $tel;

}