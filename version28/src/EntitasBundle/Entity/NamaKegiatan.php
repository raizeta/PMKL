<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NamaKegiatan
 *
 * @ORM\Table(name="nama_kegiatan")
 * @ORM\Entity
 */
class NamaKegiatan
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
     * @ORM\Column(name="nama", type="string", length=255, nullable=false)
     */
    private $nama;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="catatan", type="text", length=65535, nullable=true)
     */
    private $catatan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_periode", type="date", nullable=true)
     */
    private $startPeriode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_periode", type="date", nullable=true)
     */
    private $endPeriode;

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
     * @ORM\OneToMany(targetEntity="FosStrukorg", mappedBy="namaKegiatan")
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
     * Set nama
     *
     * @param string $nama
     *
     * @return NamaKegiatan
     */
    public function setNama($nama)
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * Get nama
     *
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Set catatan
     *
     * @param string $catatan
     *
     * @return NamaKegiatan
     */
    public function setCatatan($catatan)
    {
        $this->catatan = $catatan;

        return $this;
    }

    /**
     * Get catatan
     *
     * @return string
     */
    public function getCatatan()
    {
        return $this->catatan;
    }

    /**
     * Set startPeriode
     *
     * @param \DateTime $startPeriode
     *
     * @return NamaKegiatan
     */
    public function setStartPeriode($startPeriode)
    {
        $this->startPeriode = $startPeriode;

        return $this;
    }

    /**
     * Get startPeriode
     *
     * @return \DateTime
     */
    public function getStartPeriode()
    {
        return $this->startPeriode;
    }

    /**
     * Set endPeriode
     *
     * @param \DateTime $endPeriode
     *
     * @return NamaKegiatan
     */
    public function setEndPeriode($endPeriode)
    {
        $this->endPeriode = $endPeriode;

        return $this;
    }

    /**
     * Get endPeriode
     *
     * @return \DateTime
     */
    public function getEndPeriode()
    {
        return $this->endPeriode;
    }

    /**
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return NamaKegiatan
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
     * @return NamaKegiatan
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
     * @return NamaKegiatan
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
     * @return NamaKegiatan
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

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return NamaKegiatan
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
