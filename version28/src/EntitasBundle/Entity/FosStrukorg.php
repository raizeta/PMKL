<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosStrukorg
 *
 * @ORM\Table(name="fos_strukorg", indexes={@ORM\Index(name="parent_jabatan", columns={"parent_jabatan"}), @ORM\Index(name="pj_jabatan", columns={"pj_jabatan"})})
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
     * @ORM\Column(name="nama_jabatan", type="string", length=50, nullable=false)
     */
    private $namaJabatan;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_pejabat", type="string", length=50, nullable=false)
     */
    private $iconPejabat;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_kegiatan", type="string", length=255, nullable=false)
     */
    private $namaKegiatan;

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
     *   @ORM\JoinColumn(name="parent_jabatan", referencedColumnName="id")
     * })
     */
    private $parentJabatan;

    /**
     * @var \FosStrukorg
     * @ORM\OneToMany(targetEntity="FosStrukorg", mappedBy="parentJabatan")
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

    public function __construct() 
    {
        $this->childrens    = new \Doctrine\Common\Collections\ArrayCollection();;
        $this->createAt     = new \Datetime('now');
        $this->updateAt     = new \Datetime('now');
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
     * Set namaKegiatan
     *
     * @param string $namaKegiatan
     *
     * @return FosStrukorg
     */
    public function setNamaKegiatan($namaKegiatan)
    {
        $this->namaKegiatan = $namaKegiatan;

        return $this;
    }

    /**
     * Get namaKegiatan
     *
     * @return string
     */
    public function getNamaKegiatan()
    {
        return $this->namaKegiatan;
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
     * Set parentJabatan
     *
     * @param \EntitasBundle\Entity\FosStrukorg $parentJabatan
     *
     * @return FosStrukorg
     */
    public function setParentJabatan(\EntitasBundle\Entity\FosStrukorg $parentJabatan = null)
    {
        $this->parentJabatan = $parentJabatan;

        return $this;
    }

    /**
     * Get parentJabatan
     *
     * @return \EntitasBundle\Entity\FosStrukorg
     */
    public function getParentJabatan()
    {
        return $this->parentJabatan;
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
}
