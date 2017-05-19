<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblPemasukan
 *
 * @ORM\Table(name="tbl_pemasukan", indexes={@ORM\Index(name="type_pemasukan", columns={"type_pemasukan"})})
 * @ORM\Entity
 */
class TblPemasukan
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
     * @ORM\Column(name="catatan", type="text", length=65535, nullable=false)
     */
    private $catatan;

    /**
     * @var integer
     *
     * @ORM\Column(name="jumlah_pemasukan", type="integer", nullable=false)
     */
    private $jumlahPemasukan;

    /**
     * @var string
     *
     * @ORM\Column(name="donatur", type="text", length=65535, nullable=false)
     */
    private $donatur;

    /**
     * @var string
     *
     * @ORM\Column(name="diterima_oleh", type="string", length=255, nullable=false)
     */
    private $diterimaOleh;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="diterima_tanggal", type="date", nullable=false)
     */
    private $diterimaTanggal;

    /**
     * @var integer
     *
     * @ORM\Column(name="status_display", type="integer", nullable=false)
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
     * @var \FosTypepemasukan
     *
     * @ORM\ManyToOne(targetEntity="FosTypepemasukan",inversedBy="pemasukans")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_pemasukan", referencedColumnName="id")
     * })
     */
    private $typePemasukan;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createAt         = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->statusDisplay    = true;
        $this->diterimaTanggal  = new \DateTime('now');
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
     * Set catatan
     *
     * @param string $catatan
     *
     * @return TblPemasukan
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
     * Set jumlahPemasukan
     *
     * @param integer $jumlahPemasukan
     *
     * @return TblPemasukan
     */
    public function setJumlahPemasukan($jumlahPemasukan)
    {
        $this->jumlahPemasukan = $jumlahPemasukan;

        return $this;
    }

    /**
     * Get jumlahPemasukan
     *
     * @return integer
     */
    public function getJumlahPemasukan()
    {
        return $this->jumlahPemasukan;
    }

    /**
     * Set diterimaOleh
     *
     * @param string $diterimaOleh
     *
     * @return TblPemasukan
     */
    public function setDiterimaOleh($diterimaOleh)
    {
        $this->diterimaOleh = $diterimaOleh;

        return $this;
    }

    /**
     * Get diterimaOleh
     *
     * @return string
     */
    public function getDiterimaOleh()
    {
        return $this->diterimaOleh;
    }

    /**
     * Set diterimaTanggal
     *
     * @param \DateTime $diterimaTanggal
     *
     * @return TblPemasukan
     */
    public function setDiterimaTanggal($diterimaTanggal)
    {
        $this->diterimaTanggal = $diterimaTanggal;

        return $this;
    }

    /**
     * Get diterimaTanggal
     *
     * @return \DateTime
     */
    public function getDiterimaTanggal()
    {
        return $this->diterimaTanggal;
    }

    /**
     * Set statusDisplay
     *
     * @param integer $statusDisplay
     *
     * @return TblPemasukan
     */
    public function setStatusDisplay($statusDisplay)
    {
        $this->statusDisplay = $statusDisplay;

        return $this;
    }

    /**
     * Get statusDisplay
     *
     * @return integer
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
     * @return TblPemasukan
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
     * @return TblPemasukan
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
     * Set typePemasukan
     *
     * @param \EntitasBundle\Entity\FosTypepemasukan $typePemasukan
     *
     * @return TblPemasukan
     */
    public function setTypePemasukan(\EntitasBundle\Entity\FosTypepemasukan $typePemasukan = null)
    {
        $this->typePemasukan = $typePemasukan;

        return $this;
    }

    /**
     * Get typePemasukan
     *
     * @return \EntitasBundle\Entity\FosTypepemasukan
     */
    public function getTypePemasukan()
    {
        return $this->typePemasukan;
    }

    /**
     * Set donatur
     *
     * @param string $donatur
     *
     * @return TblPemasukan
     */
    public function setDonatur($donatur)
    {
        $this->donatur = $donatur;

        return $this;
    }

    /**
     * Get donatur
     *
     * @return string
     */
    public function getDonatur()
    {
        return $this->donatur;
    }
}
