<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosProfile
 *
 * @ORM\Table(name="fos_profile", indexes={@ORM\Index(name="jenis_kelamin", columns={"jenis_kelamin"})})
 * @ORM\Entity
 */
class FosProfile
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
     * @ORM\Column(name="nama_lengkap", type="string", length=255, nullable=false)
     */
    private $namaLengkap;

    /**
     * @var string
     *
     * @ORM\Column(name="tempat_lahir", type="string", length=255, nullable=false)
     */
    private $tempatLahir;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tanggal_lahir", type="date", nullable=false)
     */
    private $tanggalLahir;

    /**
     * @var string
     *
     * @ORM\Column(name="alamat_sekarang", type="text", length=65535, nullable=false)
     */
    private $alamatSekarang;

    /**
     * @var string
     *
     * @ORM\Column(name="nomor_handphone", type="string", length=255, nullable=false)
     */
    private $nomorHandphone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status_display", type="boolean", nullable=false, options={"default":true})
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
     * @ORM\Column(name="update_at", type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @var \FosKelamin
     *
     * @ORM\ManyToOne(targetEntity="FosKelamin",inversedBy="profiles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jenis_kelamin", referencedColumnName="id")
     * })
     */
    private $jenisKelamin;

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
     * Set namaLengkap
     *
     * @param string $namaLengkap
     *
     * @return FosProfile
     */
    public function setNamaLengkap($namaLengkap)
    {
        $this->namaLengkap = $namaLengkap;

        return $this;
    }

    /**
     * Get namaLengkap
     *
     * @return string
     */
    public function getNamaLengkap()
    {
        return $this->namaLengkap;
    }

    /**
     * Set tempatLahir
     *
     * @param string $tempatLahir
     *
     * @return FosProfile
     */
    public function setTempatLahir($tempatLahir)
    {
        $this->tempatLahir = $tempatLahir;

        return $this;
    }

    /**
     * Get tempatLahir
     *
     * @return string
     */
    public function getTempatLahir()
    {
        return $this->tempatLahir;
    }

    /**
     * Set tanggalLahir
     *
     * @param \DateTime $tanggalLahir
     *
     * @return FosProfile
     */
    public function setTanggalLahir($tanggalLahir)
    {
        $this->tanggalLahir = $tanggalLahir;

        return $this;
    }

    /**
     * Get tanggalLahir
     *
     * @return \DateTime
     */
    public function getTanggalLahir()
    {
        return $this->tanggalLahir;
    }

    /**
     * Set alamatSekarang
     *
     * @param string $alamatSekarang
     *
     * @return FosProfile
     */
    public function setAlamatSekarang($alamatSekarang)
    {
        $this->alamatSekarang = $alamatSekarang;

        return $this;
    }

    /**
     * Get alamatSekarang
     *
     * @return string
     */
    public function getAlamatSekarang()
    {
        return $this->alamatSekarang;
    }

    /**
     * Set nomorHandphone
     *
     * @param string $nomorHandphone
     *
     * @return FosProfile
     */
    public function setNomorHandphone($nomorHandphone)
    {
        $this->nomorHandphone = $nomorHandphone;

        return $this;
    }

    /**
     * Get nomorHandphone
     *
     * @return string
     */
    public function getNomorHandphone()
    {
        return $this->nomorHandphone;
    }

    /**
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return FosProfile
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
     * @return FosProfile
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
     * @return FosProfile
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
     * Set jenisKelamin
     *
     * @param \EntitasBundle\Entity\FosKelamin $jenisKelamin
     *
     * @return FosProfile
     */
    public function setJenisKelamin(\EntitasBundle\Entity\FosKelamin $jenisKelamin = null)
    {
        $this->jenisKelamin = $jenisKelamin;

        return $this;
    }

    /**
     * Get jenisKelamin
     *
     * @return \EntitasBundle\Entity\FosKelamin
     */
    public function getJenisKelamin()
    {
        return $this->jenisKelamin;
    }
}
