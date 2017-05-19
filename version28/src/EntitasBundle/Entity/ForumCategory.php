<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumCategory
 *
 * @ORM\Table(name="forum_category")
 * @ORM\Entity
 */
class ForumCategory
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
     * @ORM\Column(name="nama_category", type="string", length=255, nullable=false)
     */
    private $namaCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="deskripsi_category", type="text", length=65535, nullable=false)
     */
    private $deskripsiCategory;

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
     * @ORM\OneToMany(targetEntity="ForumContent", mappedBy="forumCategorys")
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
     * Set namaCategory
     *
     * @param string $namaCategory
     *
     * @return ForumCategory
     */
    public function setNamaCategory($namaCategory)
    {
        $this->namaCategory = $namaCategory;

        return $this;
    }

    /**
     * Get namaCategory
     *
     * @return string
     */
    public function getNamaCategory()
    {
        return $this->namaCategory;
    }

    /**
     * Set deskripsiCategory
     *
     * @param string $deskripsiCategory
     *
     * @return ForumCategory
     */
    public function setDeskripsiCategory($deskripsiCategory)
    {
        $this->deskripsiCategory = $deskripsiCategory;

        return $this;
    }

    /**
     * Get deskripsiCategory
     *
     * @return string
     */
    public function getDeskripsiCategory()
    {
        return $this->deskripsiCategory;
    }

    /**
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return ForumCategory
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
     * @return ForumCategory
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
     * @return ForumCategory
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
     * @return ForumCategory
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
