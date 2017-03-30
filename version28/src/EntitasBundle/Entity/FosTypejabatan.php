<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosTypejabatan
 *
 * @ORM\Table(name="fos_typejabatan")
 * @ORM\Entity
 */
class FosTypejabatan
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
     * @ORM\Column(name="nama_type", type="string", length=50, nullable=false)
     */
    private $namaType;

    /**
     * @var string
     *
     * @ORM\Column(name="deskripsi_type", type="text", length=65535, nullable=false)
     */
    private $deskripsiType;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status_display", type="boolean", nullable=false)
     */
    private $statusDisplay;

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
     * @ORM\OneToMany(targetEntity="FosStrukorg", mappedBy="typeJabatans")
     */
    protected $strukorgs;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createAt         = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->statusDisplay    = true;
        $this->strukorgs        = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set namaType
     *
     * @param string $namaType
     *
     * @return FosTypejabatan
     */
    public function setNamaType($namaType)
    {
        $this->namaType = $namaType;

        return $this;
    }

    /**
     * Get namaType
     *
     * @return string
     */
    public function getNamaType()
    {
        return $this->namaType;
    }

    /**
     * Set deskripsiType
     *
     * @param string $deskripsiType
     *
     * @return FosTypejabatan
     */
    public function setDeskripsiType($deskripsiType)
    {
        $this->deskripsiType = $deskripsiType;

        return $this;
    }

    /**
     * Get deskripsiType
     *
     * @return string
     */
    public function getDeskripsiType()
    {
        return $this->deskripsiType;
    }

    /**
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return FosTypejabatan
     */
    public function setStatusDisplay($statusDisplay)
    {
        $this->statusDisplay = $statusDisplay;

        return $this;
    }

    /**
     * Get statusDisplay
     *
     * @return boolean
     */
    public function getStatusDisplay()
    {
        return $this->statusDisplay;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return FosTypejabatan
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
     * @return FosTypejabatan
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
     * Add strukorg
     *
     * @param \EntitasBundle\Entity\FosStrukorg $strukorg
     *
     * @return FosTypejabatan
     */
    public function addStrukorg(\EntitasBundle\Entity\FosStrukorg $strukorg)
    {
        $this->strukorgs[] = $strukorg;

        return $this;
    }

    /**
     * Remove strukorg
     *
     * @param \EntitasBundle\Entity\FosStrukorg $strukorg
     */
    public function removeStrukorg(\EntitasBundle\Entity\FosStrukorg $strukorg)
    {
        $this->strukorgs->removeElement($strukorg);
    }

    /**
     * Get strukorgs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStrukorgs()
    {
        return $this->strukorgs;
    }
}
