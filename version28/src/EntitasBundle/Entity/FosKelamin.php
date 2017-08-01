<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMSSerializer;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Exclude;
/**
 * FosKelamin
 *
 * @ORM\Table(name="fos_kelamin")
 * @ORM\Entity
 * @JMSSerializer\ExclusionPolicy("all")
 */
class FosKelamin
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
     * @ORM\Column(name="nama_kelamin", type="string", length=50, nullable=false)
     * @JMSSerializer\Expose
     */
    private $namaKelamin;

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
     * @var integer
     *
     * @ORM\Column(name="create_by", type="integer", nullable=false)
     */
    private $createBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="update_by", type="integer", nullable=true)
     */
    private $updateBy;

    /**
     * @ORM\OneToMany(targetEntity="FosProfile", mappedBy="jenisKelamin")
     */
    protected $profiles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createAt         = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->profiles         = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set namaKelamin
     *
     * @param string $namaKelamin
     *
     * @return FosKelamin
     */
    public function setNamaKelamin($namaKelamin)
    {
        $this->namaKelamin = $namaKelamin;

        return $this;
    }

    /**
     * Get namaKelamin
     *
     * @return string
     */
    public function getNamaKelamin()
    {
        return $this->namaKelamin;
    }

    /**
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return FosKelamin
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
     * @return FosKelamin
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
     * Set createBy
     *
     * @param integer $createBy
     *
     * @return FosKelamin
     */
    public function setCreateBy($createBy)
    {
        $this->createBy = $createBy;

        return $this;
    }

    /**
     * Get createBy
     *
     * @return integer
     */
    public function getCreateBy()
    {
        return $this->createBy;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return FosKelamin
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
     * Set updateBy
     *
     * @param integer $updateBy
     *
     * @return FosKelamin
     */
    public function setUpdateBy($updateBy)
    {
        $this->updateBy = $updateBy;

        return $this;
    }

    /**
     * Get updateBy
     *
     * @return integer
     */
    public function getUpdateBy()
    {
        return $this->updateBy;
    }

    /**
     * Add profile
     *
     * @param \EntitasBundle\Entity\FosProfile $profile
     *
     * @return FosKelamin
     */
    public function addProfile(\EntitasBundle\Entity\FosProfile $profile)
    {
        $this->profiles[] = $profile;

        return $this;
    }

    /**
     * Remove profile
     *
     * @param \EntitasBundle\Entity\FosProfile $profile
     */
    public function removeProfile(\EntitasBundle\Entity\FosProfile $profile)
    {
        $this->profiles->removeElement($profile);
    }

    /**
     * Get profiles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfiles()
    {
        return $this->profiles;
    }
}
