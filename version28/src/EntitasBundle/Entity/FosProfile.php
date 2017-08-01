<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use JMS\Serializer\Annotation as JMSSerializer;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\SerializerBundle\Annotation\Exclude;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * FosProfile
 *
 * @ORM\Table(name="fos_profile", indexes={@ORM\Index(name="jenis_kelamin", columns={"jenis_kelamin"}), @ORM\Index(name="type_pendidikan", columns={"type_pendidikan"}),@ORM\Index(name="type_anggotas", columns={"type_anggotas"})})
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="EntitasBundle\Repositories\FosProfileRepository")
 * @JMSSerializer\ExclusionPolicy("all")
 */
class FosProfile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @JMSSerializer\Exclude
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_lengkap", type="string", length=255, nullable=false)
     * @JMSSerializer\Expose
     * @Assert\NotBlank(message="Please enter a Nama Lengkap")
     */
    private $namaLengkap;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     * @JMSSerializer\Expose
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="tempat_lahir", type="string", length=255, nullable=false)
     * @JMSSerializer\Expose
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $tempatLahir;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tanggal_lahir", type="date", nullable=false)
     * @JMSSerializer\Expose
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $tanggalLahir;

    /**
     * @var string
     *
     * @ORM\Column(name="alamat_sekarang", type="text", length=65535, nullable=false)
     * @JMSSerializer\Expose
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $alamatSekarang;

    /**
     * @var string
     *
     * @ORM\Column(name="nomor_handphone", type="string", length=255, nullable=false)
     * @JMSSerializer\Expose
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $nomorHandphone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status_display", type="boolean", nullable=false, options={"default":true})
     * @JMSSerializer\Expose
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     * 
     * @var File
     * @JMSSerializer\Expose
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $imageName;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_sma", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $namaSma;

    /**
     * @var string
     *
     * @ORM\Column(name="jurusan_sma", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $jurusanSma;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="masuk_sma", type="datetime", nullable=true)
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $masukSma;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lulus_sma", type="datetime", nullable=true)
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $lulusSma;

    /**
     * @var \FosKelamin
     *
     * @ORM\ManyToOne(targetEntity="FosKelamin",inversedBy="profiles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jenis_kelamin", referencedColumnName="id")
     * })
     * @JMSSerializer\Expose
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $jenisKelamin;

    /**
     * @ORM\OneToMany(targetEntity="FosStrukorg", mappedBy="pjJabatan")
     */
    protected $strukorgs;

    /**
     * @var \FosTypeanggota
     *
     * @ORM\ManyToOne(targetEntity="FosTypeanggota",inversedBy="profiles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_anggotas", referencedColumnName="id")
     * })
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $typeAnggotas;

    /**
     * @var \FosTypeanggota
     *
     * @ORM\ManyToOne(targetEntity="FosTypependidikan",inversedBy="profiles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_pendidikan", referencedColumnName="id")
     * })
     * @JMSSerializer\Expose
     * @Assert\NotBlank(message="Please enter a Slug")
     */
    private $typePendidikan;



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
     * @return FosProfile
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

    /**
     * Add strukorg
     *
     * @param \EntitasBundle\Entity\FosStrukorg $strukorg
     *
     * @return FosProfile
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
     * Set typeAnggotas
     *
     * @param \EntitasBundle\Entity\FosTypeanggota $typeAnggotas
     *
     * @return FosProfile
     */
    public function setTypeAnggotas(\EntitasBundle\Entity\FosTypeanggota $typeAnggotas = null)
    {
        $this->typeAnggotas = $typeAnggotas;

        return $this;
    }

    /**
     * Get typeAnggotas
     *
     * @return \EntitasBundle\Entity\FosTypeanggota
     */
    public function getTypeAnggotas()
    {
        return $this->typeAnggotas;
    }

    /**
     * Set namaSma
     *
     * @param string $namaSma
     *
     * @return FosProfile
     */
    public function setNamaSma($namaSma)
    {
        $this->namaSma = $namaSma;

        return $this;
    }

    /**
     * Get namaSma
     *
     * @return string
     */
    public function getNamaSma()
    {
        return $this->namaSma;
    }

    /**
     * Set jurusanSma
     *
     * @param string $jurusanSma
     *
     * @return FosProfile
     */
    public function setJurusanSma($jurusanSma)
    {
        $this->jurusanSma = $jurusanSma;

        return $this;
    }

    /**
     * Get jurusanSma
     *
     * @return string
     */
    public function getJurusanSma()
    {
        return $this->jurusanSma;
    }

    /**
     * Set masukSma
     *
     * @param \DateTime $masukSma
     *
     * @return FosProfile
     */
    public function setMasukSma($masukSma)
    {
        $this->masukSma = $masukSma;

        return $this;
    }

    /**
     * Get masukSma
     *
     * @return \DateTime
     */
    public function getMasukSma()
    {
        return $this->masukSma;
    }

    /**
     * Set lulusSma
     *
     * @param \DateTime $lulusSma
     *
     * @return FosProfile
     */
    public function setLulusSma($lulusSma)
    {
        $this->lulusSma = $lulusSma;

        return $this;
    }

    /**
     * Get lulusSma
     *
     * @return \DateTime
     */
    public function getLulusSma()
    {
        return $this->lulusSma;
    }

    /**
     * Set typePendidikan
     *
     * @param \EntitasBundle\Entity\FosTypependidikan $typePendidikan
     *
     * @return FosProfile
     */
    public function setTypePendidikan(\EntitasBundle\Entity\FosTypependidikan $typePendidikan = null)
    {
        $this->typePendidikan = $typePendidikan;

        return $this;
    }

    /**
     * Get typePendidikan
     *
     * @return \EntitasBundle\Entity\FosTypependidikan
     */
    public function getTypePendidikan()
    {
        return $this->typePendidikan;
    }
}
