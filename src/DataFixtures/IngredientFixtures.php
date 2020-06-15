<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

         for($i=1;$i<=10 ; $i++){
             $ingredient = new Ingredient();
             $ingredient->setName("ingredient $i");
             $recipe = new Recipe();
             $recipe->setTitle("recipe $i");
             $recipe->setSubTitle("recipe $i");
             $manager->persist($recipe);
             $ingredient->setRecipe($recipe);
             $manager->persist($ingredient);
         }




        $manager->flush();
    }
}
