<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 *
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull
     *
     */
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sub_title;


    /**
     * @ORM\Column(name="ingredients",type="json_array")
     * @Assert\NotNull
     *
     */
    private $ingredients;



    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getSubTitle(): ?string
    {
        return $this->Sub_title;
    }

    public function setSubTitle(string $Sub_title): self
    {
        $this->Sub_title = $Sub_title;

        return $this;
    }



    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    /**
     *
     * @return array
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param array  $ingredients
     */
    public function setIngredients($ingredients): void
    {
        $this->ingredients = $ingredients;
    }



   
}
