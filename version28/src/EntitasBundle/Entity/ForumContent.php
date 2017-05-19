<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * ForumContent
 *
 * @ORM\Table(name="forum_content", indexes={@ORM\Index(name="forum_categorys", columns={"forum_categorys"}), @ORM\Index(name="authors", columns={"authors"}), @ORM\Index(name="status_content", columns={"status_content"})})
 * @ORM\Entity
 * @Vich\Uploadable
 */
class ForumContent
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
     * @ORM\Column(name="judul_content", type="string", length=255, nullable=false)
     */
    private $judulContent;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_content", type="string", length=255, nullable=false)
     */
    private $slugContent;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_content", type="text", length=65535, nullable=false)
     */
    private $summaryContent;

    /**
     * @var string
     *
     * @ORM\Column(name="isi_content", type="text", length=65535, nullable=false)
     */
    private $isiContent;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="forumcontent_image", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

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
     * @var \ForumStatus
     *
     * @ORM\ManyToOne(targetEntity="ForumStatus",inversedBy="forumcontents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_content", referencedColumnName="id")
     * })
     */
    private $statusContent;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="UsersBundle\Entity\User",inversedBy="forumcontents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="authors", referencedColumnName="id")
     * })
     */
    private $authors;

    /**
     * @var \ForumCategory
     *
     * @ORM\ManyToOne(targetEntity="ForumCategory",inversedBy="forumcontents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forum_categorys", referencedColumnName="id")
     * })
     */
    private $forumCategorys;

    /**
     * @ORM\OneToMany(targetEntity="ForumKomentar", mappedBy="forumContent")
     */
    protected $komentars;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->createAt         = new \DateTime('now');
        $this->updateAt         = new \DateTime('now');
        $this->summaryContent   = "Tulis Summary Content Disini";
        $this->isiContent       = "Tulis Isi Content Disini";
        $this->komentars        = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set judulContent
     *
     * @param string $judulContent
     *
     * @return ForumContent
     */
    public function setJudulContent($judulContent)
    {
        $this->judulContent = $judulContent;

        return $this;
    }

    /**
     * Get judulContent
     *
     * @return string
     */
    public function getJudulContent()
    {
        return $this->judulContent;
    }

    /**
     * Set slugContent
     *
     * @param string $slugContent
     *
     * @return ForumContent
     */
    public function setSlugContent($slugContent)
    {
        $this->slugContent = $slugContent;

        return $this;
    }

    /**
     * Get slugContent
     *
     * @return string
     */
    public function getSlugContent()
    {
        return $this->slugContent;
    }

    /**
     * Set summaryContent
     *
     * @param string $summaryContent
     *
     * @return ForumContent
     */
    public function setSummaryContent($summaryContent)
    {
        $this->summaryContent = $summaryContent;

        return $this;
    }

    /**
     * Get summaryContent
     *
     * @return string
     */
    public function getSummaryContent()
    {
        return $this->summaryContent;
    }

    /**
     * Set isiContent
     *
     * @param string $isiContent
     *
     * @return ForumContent
     */
    public function setIsiContent($isiContent)
    {
        $this->isiContent = $isiContent;

        return $this;
    }

    /**
     * Get isiContent
     *
     * @return string
     */
    public function getIsiContent()
    {
        return $this->isiContent;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return ForumContent
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
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return ForumContent
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
     * @return ForumContent
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
     * Set statusContent
     *
     * @param \EntitasBundle\Entity\ForumStatus $statusContent
     *
     * @return ForumContent
     */
    public function setStatusContent(\EntitasBundle\Entity\ForumStatus $statusContent = null)
    {
        $this->statusContent = $statusContent;

        return $this;
    }

    /**
     * Get statusContent
     *
     * @return \EntitasBundle\Entity\ForumStatus
     */
    public function getStatusContent()
    {
        return $this->statusContent;
    }

    /**
     * Set authors
     *
     * @param \UsersBundle\Entity\User $authors
     *
     * @return ForumContent
     */
    public function setAuthors(\UsersBundle\Entity\User $authors = null)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors
     *
     * @return \UsersBundle\Entity\User
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Set forumCategorys
     *
     * @param \EntitasBundle\Entity\ForumCategory $forumCategorys
     *
     * @return ForumContent
     */
    public function setForumCategorys(\EntitasBundle\Entity\ForumCategory $forumCategorys = null)
    {
        $this->forumCategorys = $forumCategorys;

        return $this;
    }

    /**
     * Get forumCategorys
     *
     * @return \EntitasBundle\Entity\ForumCategory
     */
    public function getForumCategorys()
    {
        return $this->forumCategorys;
    }

    /**
     * Add komentar
     *
     * @param \EntitasBundle\Entity\ForumKomentar $komentar
     *
     * @return ForumContent
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
