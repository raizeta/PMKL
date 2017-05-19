<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblPengeluaran
 *
 * @ORM\Table(name="tbl_pengeluaran", indexes={@ORM\Index(name="type_pengeluaran", columns={"type_pengeluaran"})})
 * @ORM\Entity
 */
class TblPengeluaran
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
     * @ORM\Column(name="nama_pemakai", type="string", length=255, nullable=false)
     */
    private $namaPemakai;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_penyerah", type="string", length=255, nullable=false)
     */
    private $namaPenyerah;

    /**
     * @var integer
     *
     * @ORM\Column(name="jumlah", type="integer", nullable=false)
     */
    private $jumlah;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tanggalpenyerahan", type="date", nullable=false)
     */
    private $tanggalpenyerahan;

    /**
     * @var string
     *
     * @ORM\Column(name="catatan", type="text", length=65535, nullable=false)
     */
    private $catatan;

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
     * @var \FosTypepengeluaran
     *
     * @ORM\ManyToOne(targetEntity="FosTypepengeluaran",inversedBy="pengeluarans")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_pengeluaran", referencedColumnName="id")
     * })
     */
    private $typePengeluaran;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createAt             = new \DateTime('now');
        $this->updateAt             = new \DateTime('now');
        $this->statusDisplay        = true;
        $this->tanggalpenyerahan    = new \DateTime('now');
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
     * Set namaPemakai
     *
     * @param string $namaPemakai
     *
     * @return TblPengeluaran
     */
    public function setNamaPemakai($namaPemakai)
    {
        $this->namaPemakai = $namaPemakai;

        return $this;
    }

    /**
     * Get namaPemakai
     *
     * @return string
     */
    public function getNamaPemakai()
    {
        return $this->namaPemakai;
    }

    /**
     * Set namaPenyerah
     *
     * @param string $namaPenyerah
     *
     * @return TblPengeluaran
     */
    public function setNamaPenyerah($namaPenyerah)
    {
        $this->namaPenyerah = $namaPenyerah;

        return $this;
    }

    /**
     * Get namaPenyerah
     *
     * @return string
     */
    public function getNamaPenyerah()
    {
        return $this->namaPenyerah;
    }

    /**
     * Set jumlah
     *
     * @param integer $jumlah
     *
     * @return TblPengeluaran
     */
    public function setJumlah($jumlah)
    {
        $this->jumlah = $jumlah;

        return $this;
    }

    /**
     * Get jumlah
     *
     * @return integer
     */
    public function getJumlah()
    {
        return $this->jumlah;
    }

    /**
     * Set tanggalpenyerahan
     *
     * @param \DateTime $tanggalpenyerahan
     *
     * @return TblPengeluaran
     */
    public function setTanggalpenyerahan($tanggalpenyerahan)
    {
        $this->tanggalpenyerahan = $tanggalpenyerahan;

        return $this;
    }

    /**
     * Get tanggalpenyerahan
     *
     * @return \DateTime
     */
    public function getTanggalpenyerahan()
    {
        return $this->tanggalpenyerahan;
    }

    /**
     * Set catatan
     *
     * @param string $catatan
     *
     * @return TblPengeluaran
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
     * Set statusDisplay
     *
     * @param integer $statusDisplay
     *
     * @return TblPengeluaran
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
     * @return TblPengeluaran
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
     * @return TblPengeluaran
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
     * Set typePengeluaran
     *
     * @param \EntitasBundle\Entity\FosTypepengeluaran $typePengeluaran
     *
     * @return TblPengeluaran
     */
    public function setTypePengeluaran(\EntitasBundle\Entity\FosTypepengeluaran $typePengeluaran = null)
    {
        $this->typePengeluaran = $typePengeluaran;

        return $this;
    }

    /**
     * Get typePengeluaran
     *
     * @return \EntitasBundle\Entity\FosTypepengeluaran
     */
    public function getTypePengeluaran()
    {
        return $this->typePengeluaran;
    }
}
