<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * FosLogoorg
 *
 * @ORM\Table(name="fos_logoorg")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class FosLogoorg
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_logo", type="string", length=255, nullable=false)
     */
    private $namaLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="deskripsi_logo", type="text", length=65535, nullable=false)
     */
    private $deskripsiLogo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime", nullable=false)
     */
    private $createAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime", nullable=false)
     */
    private $updateAt;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255, nullable=false)
     */
    private $imageName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="logoorg_image", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @var boolean
     *
     * @ORM\Column(name="setlogo_default", type="boolean", nullable=false)
     */
    private $setlogoDefault;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createAt         = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->setlogoDefault   = false;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set namaLogo
     *
     * @param string $namaLogo
     *
     * @return FosLogoorg
     */
    public function setNamaLogo($namaLogo)
    {
        $this->namaLogo = $namaLogo;

        return $this;
    }

    /**
     * Get namaLogo
     *
     * @return string
     */
    public function getNamaLogo()
    {
        return $this->namaLogo;
    }

    /**
     * Set deskripsiLogo
     *
     * @param string $deskripsiLogo
     *
     * @return FosLogoorg
     */
    public function setDeskripsiLogo($deskripsiLogo)
    {
        $this->deskripsiLogo = $deskripsiLogo;

        return $this;
    }

    /**
     * Get deskripsiLogo
     *
     * @return string
     */
    public function getDeskripsiLogo()
    {
        return $this->deskripsiLogo;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return FosLogoorg
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return FosLogoorg
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return FosProfile
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updateAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
    */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return FosLogoorg
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set setlogoDefault
     *
     * @param boolean $setlogoDefault
     *
     * @return FosLogoorg
     */
    public function setSetlogoDefault($setlogoDefault)
    {
        $this->setlogoDefault = $setlogoDefault;

        return $this;
    }

    /**
     * Get setlogoDefault
     *
     * @return boolean
     */
    public function getSetlogoDefault()
    {
        return $this->setlogoDefault;
    }
}
