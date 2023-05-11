<?php

namespace MyApp\EstoreBundle\Entity;
use Doctrine\ORM\Mapping as Gaethan;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Gaethan\Entity(repositoryClass="MyApp\EstoreBundle\Repository\VoitureRepository")
 * @Gaethan\Table()
 * @Vich\Uploadable
 */
class Voiture
{
    /**
     * @Gaethan\Id
     * @Gaethan\GeneratedValue
     * @Gaethan\Column(type="integer")
     */
    private  $id;

    /**
     * @Gaethan\Column(type="string",length=500,nullable=true)
     */
    private $Nom;

    /**
     * @Gaethan\Column(type="string",nullable=true)
     */
    private $matricule;


    /**
     * @Gaethan\Column(type="datetime",nullable=true)
     */
    private $date;

    /**
     * @Gaethan\Column(type="integer",nullable=true)
     */
    private $prix;



    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="voiture_image", fileNameProperty="imageName")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @Gaethan\Column(type="string",nullable=true)
     *
     * @var string|null
     */
    private $imageName;

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
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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





//    /**
//     * @Gaethan\Column(type="datetime")
//     */
//    private date





}