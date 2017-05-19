<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumPengumuman
 *
 * @ORM\Table(name="forum_pengumuman")
 * @ORM\Entity
 */
class ForumPengumuman
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
     * @ORM\Column(name="topik_pengumuman", type="text", length=65535, nullable=false)
     */
    private $topikPengumuman;

    /**
     * @var string
     *
     * @ORM\Column(name="judul_pengumuman", type="string", length=255, nullable=false)
     */
    private $judulPengumuman;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="isi_pengumuman", type="text", length=65535, nullable=false)
     */
    private $isiPengumuman;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="waktu_diadakan", type="datetime", nullable=false)
     */
    private $waktuDiadakan;

    /**
     * @var string
     *
     * @ORM\Column(name="tempat_diadakan", type="string", length=255, nullable=false)
     */
    private $tempatDiadakan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="crate_at", type="datetime", nullable=false)
     */
    private $crateAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime", nullable=false)
     */
    private $updateAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status_display", type="boolean", nullable=false)
     */
    private $statusDisplay;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->crateAt          = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->statusDisplay    = true;
        $this->topikPengumuman  = 'Tulis Topik Pengumuman Disini';
        $this->isiPengumuman    = 'Tulis Isi Pengumuman Disini';
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
     * Set topikPengumuman
     *
     * @param string $topikPengumuman
     *
     * @return ForumPengumuman
     */
    public function setTopikPengumuman($topikPengumuman)
    {
        $this->topikPengumuman = $topikPengumuman;

        return $this;
    }

    /**
     * Get topikPengumuman
     *
     * @return string
     */
    public function getTopikPengumuman()
    {
        return $this->topikPengumuman;
    }

    /**
     * Set judulPengumuman
     *
     * @param string $judulPengumuman
     *
     * @return ForumPengumuman
     */
    public function setJudulPengumuman($judulPengumuman)
    {
        $this->judulPengumuman = $judulPengumuman;

        return $this;
    }

    /**
     * Get judulPengumuman
     *
     * @return string
     */
    public function getJudulPengumuman()
    {
        return $this->judulPengumuman;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return ForumPengumuman
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

    /**
     * Set isiPengumuman
     *
     * @param string $isiPengumuman
     *
     * @return ForumPengumuman
     */
    public function setIsiPengumuman($isiPengumuman)
    {
        $this->isiPengumuman = $isiPengumuman;

        return $this;
    }

    /**
     * Get isiPengumuman
     *
     * @return string
     */
    public function getIsiPengumuman()
    {
        return $this->isiPengumuman;
    }

    /**
     * Set waktuDiadakan
     *
     * @param \DateTime $waktuDiadakan
     *
     * @return ForumPengumuman
     */
    public function setWaktuDiadakan($waktuDiadakan)
    {
        $this->waktuDiadakan = $waktuDiadakan;

        return $this;
    }

    /**
     * Get waktuDiadakan
     *
     * @return \DateTime
     */
    public function getWaktuDiadakan()
    {
        return $this->waktuDiadakan;
    }

    /**
     * Set tempatDiadakan
     *
     * @param string $tempatDiadakan
     *
     * @return ForumPengumuman
     */
    public function setTempatDiadakan($tempatDiadakan)
    {
        $this->tempatDiadakan = $tempatDiadakan;

        return $this;
    }

    /**
     * Get tempatDiadakan
     *
     * @return string
     */
    public function getTempatDiadakan()
    {
        return $this->tempatDiadakan;
    }

    /**
     * Set crateAt
     *
     * @param \DateTime $crateAt
     *
     * @return ForumPengumuman
     */
    public function setCrateAt($crateAt)
    {
        $this->crateAt = $crateAt;

        return $this;
    }

    /**
     * Get crateAt
     *
     * @return \DateTime
     */
    public function getCrateAt()
    {
        return $this->crateAt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return ForumPengumuman
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
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return ForumPengumuman
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
}
