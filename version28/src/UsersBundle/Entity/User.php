<?php

namespace UsersBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookID", type="string", nullable=true)
     */
    private $facebookID;

    /**
     * @var string
     *
     * @ORM\Column(name="googleID", type="string", nullable=true)
     */
    private $googleID;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterID", type="string", nullable=true)
     */
    private $twitterID;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinID", type="string", nullable=true)
     */
    private $linkedinID;
    
    /**
     * @ORM\OneToMany(targetEntity="EntitasBundle\Entity\ForumContent", mappedBy="authors")
     */
    protected $forumcontents;

    /**
     * @ORM\OneToMany(targetEntity="EntitasBundle\Entity\ForumKomentar", mappedBy="komentator")
     */
    protected $komentars;

    public function __construct()
    {
        parent::__construct();
        $this->forumcontents    = new \Doctrine\Common\Collections\ArrayCollection();
        $this->komentars        = new \Doctrine\Common\Collections\ArrayCollection();
        // your own logic
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
     * Set facebookID
     *
     * @param string $facebookID
     * @return User
     */
    public function setFacebookID($facebookID)
    {
        $this->facebookID = $facebookID;

        return $this;
    }

    /**
     * Get facebookID
     *
     * @return string 
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }

    /**
     * Set googleID
     *
     * @param string $googleID
     * @return User
     */
    public function setGoogleID($googleID)
    {
        $this->googleID = $googleID;

        return $this;
    }

    /**
     * Get googleID
     *
     * @return string 
     */
    public function getGoogleID()
    {
        return $this->googleID;
    }

    /**
     * Set twitterID
     *
     * @param string $twitterID
     * @return User
     */
    public function setTwitterID($twitterID)
    {
        $this->twitterID = $twitterID;

        return $this;
    }

    /**
     * Get twitterID
     *
     * @return string 
     */
    public function getTwitterID()
    {
        return $this->twitterID;
    }

    /**
     * Set linkedinID
     *
     * @param string $linkedinID
     * @return User
     */
    public function setLinkedinID($linkedinID)
    {
        $this->linkedinID = $linkedinID;

        return $this;
    }

    /**
     * Get linkedinID
     *
     * @return string 
     */
    public function getLinkedinID()
    {
        return $this->linkedinID;
    }

    /**
     * Add forumcontent
     *
     * @param \EntitasBundle\Entity\ForumContent $forumcontent
     *
     * @return User
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

    /**
     * Add komentar
     *
     * @param \EntitasBundle\Entity\ForumKomentar $komentar
     *
     * @return User
     */
    public function addKomentar(\EntitasBundle\Entity\ForumKomentar $komentar)
    {
        $this->komentars[] = $komentar;

        return $this;
    }

    /**
     * Remove komentar
     *
     * @param \EntitasBundle\Entity\ForumKomentar $komentar
     */
    public function removeKomentar(\EntitasBundle\Entity\ForumKomentar $komentar)
    {
        $this->komentars->removeElement($komentar);
    }

    /**
     * Get komentars
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKomentars()
    {
        return $this->komentars;
    }
}
