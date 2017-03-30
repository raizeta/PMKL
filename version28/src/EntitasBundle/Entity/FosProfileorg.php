<?php

namespace EntitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosProfileorg
 *
 * @ORM\Table(name="fos_profileorg")
 * @ORM\Entity
 */
class FosProfileorg
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
     * @ORM\Column(name="slug_content", type="string", length=255, nullable=true)
     */
    private $slugContent;

    /**
     * @var string
     *
     * @ORM\Column(name="summary_content", type="text", length=65535, nullable=true)
     */
    private $summaryContent;

    /**
     * @var string
     *
     * @ORM\Column(name="isi_content", type="text", length=65535, nullable=true)
     */
    private $isiContent;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_image", type="string", length=255, nullable=true)
     */
    private $iconImage;

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
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255, nullable=true)
     */
    private $imageName;



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
     * @return FosProfileorg
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
     * @return FosProfileorg
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
     * @return FosProfileorg
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
     * @return FosProfileorg
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
     * Set iconImage
     *
     * @param string $iconImage
     *
     * @return FosProfileorg
     */
    public function setIconImage($iconImage)
    {
        $this->iconImage = $iconImage;

        return $this;
    }

    /**
     * Get iconImage
     *
     * @return string
     */
    public function getIconImage()
    {
        return $this->iconImage;
    }

    /**
     * Set statusDisplay
     *
     * @param boolean $statusDisplay
     *
     * @return FosProfileorg
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
     * @return FosProfileorg
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
     * @return FosProfileorg
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
     * Set imageName
     *
     * @param string $imageName
     *
     * @return FosProfileorg
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
}
