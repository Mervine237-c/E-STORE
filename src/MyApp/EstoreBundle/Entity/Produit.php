<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as mervine;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @Vich\Uploadable
 * @mervine\Entity(repositoryClass="MyApp\EstoreBundle\Repository\VoitureRepository")
 * @mervine\Table()
 */
class Produit
{

    /**
     * @mervine\Id
     * @mervine\GeneratedValue
     * @mervine\Column(type="integer")
     */
    private  $id;

    /**
     * @mervine\ManyToOne(targetEntity="MyApp\EstoreBundle\Entity\souscategorie")
     * @mervine\JoinColumn(name="id_sc",referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    public $souscategorie;


    /**
     * @mervine\ManyToOne(targetEntity="MyApp\EstoreBundle\Entity\Client", inversedBy="produit")
     * @mervine\JoinColumn(name="id_client",referencedColumnName="id",onDelete="CASCADE",nullable=true)
     */
    public  $client;

    /**
     * @mervine\Column(type="string",length=500)
     */

    private $nom;

    /**
     * @mervine\Column(type="string",length=500)
     */
    private  $escription;
    /**
     * @mervine\Column(type="integer",length=500)
     */
    private $quantite;



    /**
     * @mervine\Column(type="datetime", nullable=true)
     */
    private $date;



    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="produit_image", fileNameProperty="imageName")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @mervine\Column(type="string",nullable=true)
     *
     * @var string|null
     */
    private $imageName;

    public function __construct()
    {
        $this->date= new \DateTime('now');
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

    /**
     * @return mixed
     */
    public function getEscription()
    {
        return $this->escription;
    }

    /**
     * @param mixed $escription
     */
    public function setEscription($escription)
    {
        $this->escription = $escription;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function __toString()
    {
        return $this->nom;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->date = new \DateTimeImmutable();
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }

}