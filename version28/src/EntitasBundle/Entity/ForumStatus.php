<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumStatus
 *
 * @ORM\Table(name="forum_status")
 * @ORM\Entity
 */
class ForumStatus
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
     * @ORM\Column(name="nama_status", type="text", length=65535, nullable=false)
     */
    private $namaStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;
    /**
     * @var string
     *
     * @ORM\Column(name="deskripsi_status", type="text", length=65535, nullable=false)
     */
    private $deskripsiStatus;

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
     * @ORM\OneToMany(targetEntity="ForumContent", mappedBy="statusContent")
     */
    protected $forumcontents;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createAt         = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->statusDisplay    = true;
        $this->forumcontents    = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set namaStatus
     *
     * @param string $namaStatus
     *
     * @return ForumStatus
     */
    public function setNamaStatus($namaStatus)
    {
        $this->namaStatus = $namaStatus;

        return $this;
    }

    /**
     * Get namaStatus
     *
     * @return string
     */
    public function getNamaStatus()
    {
        return $this->namaStatus;
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
     * Set deskripsiStatus
     *
     * @param string $deskripsiStatus
     *
     * @return ForumStatus
     */
    public function setDeskripsiStatus($deskripsiStatus)
    {
        $this->deskripsiStatus = $deskripsiStatus;

        return $this;
    }

    /**
     * Get deskripsiStatus
     *
     * @return string
     */
    public function getDeskripsiStatus()
    {
        return $this->deskripsiStatus;
    }

    /**
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return ForumStatus
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
     * @return ForumStatus
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
     * @return ForumStatus
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
     * Add forumcontent
     *
     * @param \EntitasBundle\Entity\ForumContent $forumcontent
     *
     * @return ForumStatus
     */
    public function addForumcontent(\EntitasBundle\Entity\ForumContent $forumcontent)
    {
        $this->forumcontents[] = $forumcontent;

        return $this;
    }

    /**
     * Remove forumcontent
     *
     * @param \EntitasBundle\Entity\ForumContent $forumcontent
     */
    public function removeForumcontent(\EntitasBundle\Entity\ForumContent $forumcontent)
    {
        $this->forumcontents->removeElement($forumcontent);
    }

    /**
     * Get forumcontents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getForumcontents()
    {
        return $this->forumcontents;
    }
}
