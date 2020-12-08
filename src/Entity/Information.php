<?php

namespace App\Entity;

use App\Repository\InformationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;



/**
 * @ORM\Entity(repositoryClass=InformationRepository::class)
 * @Vich\Uploadable
 */
class  Information
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $filenameprofil;

    /**
     * @Vich\UploadableField(mapping="information_image", fileNameProperty="filenameprofil")
     * @var File|null
     */
    private $imageFileProfil;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string|null
     */
    private $filenamecv;

    /**
     * @Vich\UploadableField(mapping="information_image", fileNameProperty="filenamecv")
     * @var File|null
     */
    private $imageFileCV;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $statut;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedIn;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $formation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }



    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): self
    {
        $this->github = $github;

        return $this;
    }

    public function getLinkedIn(): ?string
    {
        return $this->linkedIn;
    }

    public function setLinkedIn(?string $linkedIn): self
    {
        $this->linkedIn = $linkedIn;

        return $this;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(?string $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): self
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(?string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilenameprofil(): ?string
    {
        return $this->filenameprofil;
    }

    /**
     * @param string|null $filenameprofil
     * @return Information
     */
    public function setFilenameprofil(?string $filenameprofil): Information
    {
        $this->filenameprofil = $filenameprofil;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFileProfil(): ?File
    {
        return $this->imageFileProfil;
    }

    /**
     * @param File|null $imageFileProfil
     * @return Information
     */
    public function setImageFileProfil(?File $imageFileProfil)
    {
        $this->imageFileProfil = $imageFileProfil;
        if ($imageFileProfil){
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }


    /**
     * @param File|null $imageFileCV
     * @return Information
     */
    public function setImageFileCV(?File $imageFileCV)
    {
        $this->imageFileCV = $imageFileCV;
        if ($imageFileCV){
            $this->updatedAt = new DateTime('now');
        }
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFileCV(): ?File
    {
        return $this->imageFileCV;
    }



    /**
     * @return string|null
     */
    public function getFilenamecv(): ?string
    {
        return $this->filenamecv;
    }

    /**
     * @param string|null $filenamecv
     * @return Information
     */
    public function setFilenamecv(?string $filenamecv)
    {
        $this->filenamecv = $filenamecv;
        return $this;

    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

}
