<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $label = null;

    /**
     * @var Collection<int, CategoryMedia>
     */
    #[ORM\OneToMany(targetEntity: CategoryMedia::class, mappedBy: 'categoryId', orphanRemoval: true)]
    private Collection $categoryMedia;

    public function __construct()
    {
        $this->categoryMedia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, CategoryMedia>
     */
    public function getCategoryMedia(): Collection
    {
        return $this->categoryMedia;
    }

    public function addCategoryMedium(CategoryMedia $categoryMedium): static
    {
        if (!$this->categoryMedia->contains($categoryMedium)) {
            $this->categoryMedia->add($categoryMedium);
            $categoryMedium->setCategoryId($this);
        }

        return $this;
    }

    public function removeCategoryMedium(CategoryMedia $categoryMedium): static
    {
        if ($this->categoryMedia->removeElement($categoryMedium)) {
            // set the owning side to null (unless already changed)
            if ($categoryMedium->getCategoryId() === $this) {
                $categoryMedium->setCategoryId(null);
            }
        }

        return $this;
    }
}
