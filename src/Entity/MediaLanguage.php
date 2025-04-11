<?php

namespace App\Entity;

use App\Repository\MediaLanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaLanguageRepository::class)]
class MediaLanguage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'mediaLanguages')]
    private Collection $mediaId;

    #[ORM\ManyToOne(inversedBy: 'mediaLanguages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Language $languageId = null;

    public function __construct()
    {
        $this->mediaId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMediaId(): Collection
    {
        return $this->mediaId;
    }

    public function addMediaId(Media $mediaId): static
    {
        if (!$this->mediaId->contains($mediaId)) {
            $this->mediaId->add($mediaId);
        }

        return $this;
    }

    public function removeMediaId(Media $mediaId): static
    {
        $this->mediaId->removeElement($mediaId);

        return $this;
    }

    public function getLanguageId(): ?Language
    {
        return $this->languageId;
    }

    public function setLanguageId(?Language $languageId): static
    {
        $this->languageId = $languageId;

        return $this;
    }
}
