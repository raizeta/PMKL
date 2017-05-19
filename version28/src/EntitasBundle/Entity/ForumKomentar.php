<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForumKomentar
 *
 * @ORM\Table(name="forum_komentar", indexes={@ORM\Index(name="komentator", columns={"komentator"}), @ORM\Index(name="forum_content", columns={"forum_content"})})
 * @ORM\Entity
 */
class ForumKomentar
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
     * @ORM\Column(name="isi_komentar", type="text", length=65535, nullable=false)
     */
    private $isiKomentar;

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
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="UsersBundle\Entity\User",inversedBy="komentars")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="komentator", referencedColumnName="id")
     * })
     */
    private $komentator;

    /**
     * @var \ForumContent
     *
     * @ORM\ManyToOne(targetEntity="ForumContent",inversedBy="komentars")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forum_content", referencedColumnName="id")
     * })
     */
    private $forumContent;

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
     * Set isiKomentar
     *
     * @param string $isiKomentar
     *
     * @return ForumKomentar
     */
    public function setIsiKomentar($isiKomentar)
    {
        $this->isiKomentar = $isiKomentar;

        return $this;
    }

    /**
     * Get isiKomentar
     *
     * @return string
     */
    public function getIsiKomentar()
    {
        return $this->isiKomentar;
    }

    /**
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return ForumKomentar
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
     * @return ForumKomentar
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
     * @return ForumKomentar
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
     * Set komentator
     *
     * @param \UsersBundle\Entity\User $komentator
     *
     * @return ForumKomentar
     */
    public function setKomentator(\UsersBundle\Entity\User $komentator = null)
    {
        $this->komentator = $komentator;

        return $this;
    }

    /**
     * Get komentator
     *
     * @return \UsersBundle\Entity\User
     */
    public function getKomentator()
    {
        return $this->komentator;
    }

    /**
     * Set forumContent
     *
     * @param \EntitasBundle\Entity\ForumContent $forumContent
     *
     * @return ForumKomentar
     */
    public function setForumContent(\EntitasBundle\Entity\ForumContent $forumContent = null)
    {
        $this->forumContent = $forumContent;

        return $this;
    }

    /**
     * Get forumContent
     *
     * @return \EntitasBundle\Entity\ForumContent
     */
    public function getForumContent()
    {
        return $this->forumContent;
    }
}
