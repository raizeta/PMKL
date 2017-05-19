<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosStrukorg
 *
 * @ORM\Table(name="fos_strukorg", indexes={@ORM\Index(name="parent_jabatan", columns={"parent_typejabatan"}), @ORM\Index(name="pj_jabatan", columns={"pj_jabatan"}), @ORM\Index(name="type_jabatans", columns={"type_jabatans"}), @ORM\Index(name="nama_kegiatan", columns={"nama_kegiatan"}),})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="EntitasBundle\Repositories\FosStrukorgRepository")
 */
class FosStrukorg
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
     * @ORM\Column(name="nama_jabatan", type="string", length=255, nullable=true)
     */
    private $namaJabatan;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_assistant", type="boolean", nullable=true)
     */
    private $isAssistant;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_pejabat", type="string", length=50, nullable=false)
     */
    private $iconPejabat;

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
     * @var \FosStrukorg
     *
     * @ORM\ManyToOne(targetEntity="FosStrukorg",inversedBy="childrens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_typejabatan", referencedColumnName="id")
     * })
     */
    private $parentTypejabatan;

    /**
     * @var \MenuTree
     * @ORM\OneToMany(targetEntity="FosStrukorg", mappedBy="parentTypejabatan")
     */
    private $childrens;

    /**
     * @var \FosProfile
     *
     * @ORM\ManyToOne(targetEntity="FosProfile",inversedBy="strukorgs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pj_jabatan", referencedColumnName="id")
     * })
     */
    private $pjJabatan;

    /**
     * @var \FosTypejabatan
     *
     * @ORM\ManyToOne(targetEntity="FosTypejabatan",inversedBy="strukorgs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_jabatans", referencedColumnName="id")
     * })
     */
    private $typeJabatans;


    /**
     * @var \NamaKegiatan
     *
     * @ORM\ManyToOne(targetEntity="NamaKegiatan",inversedBy="strukorgs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nama_kegiatan", referencedColumnName="id")
     * })
     */
    private $namaKegiatan;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createAt         = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->statusDisplay    = true;
        $this->childrens        = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isAssistant      = false;
        $this->iconPejabat      = '<i class="fa fa-calendar></i>';
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
     * Set namaJabatan
     *
     * @param string $namaJabatan
     *
     * @return FosStrukorg
     */
    public function setNamaJabatan($namaJabatan)
    {
        $this->namaJabatan = $namaJabatan;

        return $this;
    }

    /**
     * Get namaJabatan
     *
     * @return string
     */
    public function getNamaJabatan()
    {
        return $this->namaJabatan;
    }

    /**
     * Set isAssistant
     *
     * @param boolean $isAssistant
     *
     * @return FosStrukorg
     */
    public function setIsAssistant($isAssistant)
    {
        $this->isAssistant = $isAssistant;

        return $this;
    }

    /**
     * Get isAssistant
     *
     * @return boolean
     */
    public function getIsAssistant()
    {
        return $this->isAssistant;
    }

    /**
     * Set iconPejabat
     *
     * @param string $iconPejabat
     *
     * @return FosStrukorg
     */
    public function setIconPejabat($iconPejabat)
    {
        $this->iconPejabat = $iconPejabat;

        return $this;
    }

    /**
     * Get iconPejabat
     *
     * @return string
     */
    public function getIconPejabat()
    {
        return $this->iconPejabat;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return FosStrukorg
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
     * @return FosStrukorg
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
     * Set parentTypejabatan
     *
     * @param \EntitasBundle\Entity\FosStrukorg $parentTypejabatan
     *
     * @return FosStrukorg
     */
    public function setParentTypejabatan(\EntitasBundle\Entity\FosStrukorg $parentTypejabatan = null)
    {
        $this->parentTypejabatan = $parentTypejabatan;

        return $this;
    }

    /**
     * Get parentTypejabatan
     *
     * @return \EntitasBundle\Entity\FosStrukorg
     */
    public function getParentTypejabatan()
    {
        return $this->parentTypejabatan;
    }

    /**
     * Add children
     *
     * @param \EntitasBundle\Entity\FosStrukorg $children
     *
     * @return FosStrukorg
     */
    public function addChildren(\EntitasBundle\Entity\FosStrukorg $children)
    {
        $this->childrens[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \EntitasBundle\Entity\FosStrukorg $children
     */
    public function removeChildren(\EntitasBundle\Entity\FosStrukorg $children)
    {
        $this->childrens->removeElement($children);
    }

    /**
     * Get childrens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildrens()
    {
        return $this->childrens;
    }

    /**
     * Set pjJabatan
     *
     * @param \EntitasBundle\Entity\FosProfile $pjJabatan
     *
     * @return FosStrukorg
     */
    public function setPjJabatan(\EntitasBundle\Entity\FosProfile $pjJabatan = null)
    {
        $this->pjJabatan = $pjJabatan;

        return $this;
    }

    /**
     * Get pjJabatan
     *
     * @return \EntitasBundle\Entity\FosProfile
     */
    public function getPjJabatan()
    {
        return $this->pjJabatan;
    }

    /**
     * Set typeJabatans
     *
     * @param \EntitasBundle\Entity\FosTypejabatan $typeJabatans
     *
     * @return FosStrukorg
     */
    public function setTypeJabatans(\EntitasBundle\Entity\FosTypejabatan $typeJabatans = null)
    {
        $this->typeJabatans = $typeJabatans;

        return $this;
    }

    /**
     * Get typeJabatans
     *
     * @return \EntitasBundle\Entity\FosTypejabatan
     */
    public function getTypeJabatans()
    {
        return $this->typeJabatans;
    }

    /**
     * Set namaKegiatan
     *
     * @param \EntitasBundle\Entity\NamaKegiatan $namaKegiatan
     *
     * @return FosStrukorg
     */
    public function setNamaKegiatan(\EntitasBundle\Entity\NamaKegiatan $namaKegiatan = null)
    {
        $this->namaKegiatan = $namaKegiatan;

        return $this;
    }

    /**
     * Get namaKegiatan
     *
     * @return \EntitasBundle\Entity\NamaKegiatan
     */
    public function getNamaKegiatan()
    {
        return $this->namaKegiatan;
    }
}
