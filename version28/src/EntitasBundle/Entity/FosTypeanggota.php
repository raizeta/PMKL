<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosTypeanggota
 *
 * @ORM\Table(name="fos_typeanggota")
 * @ORM\Entity
 */
class FosTypeanggota
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
     * @ORM\Column(name="nama_type", type="string", length=255, nullable=false)
     */
    private $namaType;

    /**
     * @var string
     *
     * @ORM\Column(name="deskripsi_type", type="string", length=255, nullable=false)
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
     * Constructor
     */
    public function __construct()
    {
        $this->createAt         = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->statusDisplay    = true;
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
     * @return FosTypeanggota
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
     * @return FosTypeanggota
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
     * @return FosTypeanggota
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
     * @return FosTypeanggota
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
     * @return FosTypeanggota
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
}
