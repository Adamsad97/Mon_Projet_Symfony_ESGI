<?php

namespace App\Entity;

use App\Repository\CategoryMediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryMediaRepository::class)]
class CategoryMedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'categoryMedia')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Media $mediaId = null;

    #[ORM\ManyToOne(inversedBy: 'categoryMedia')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $categoryId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMediaId(): ?Media
    {
        return $this->mediaId;
    }

    public function setMediaId(?Media $mediaId): static
    {
        $this->mediaId = $mediaId;

        return $this;
    }

    public function getCategoryId(): ?Category
    {
        return $this->categoryId;
    }

    public function setCategoryId(?Category $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }
}
