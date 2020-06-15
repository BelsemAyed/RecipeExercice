<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\Recipe;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\TextType ;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Sub_title')
            ->add('Title',TextType::class,['constraints' => [new NotBlank(),new Length(['min' => 3])]])
            ->add('Ingredients',  ChoiceType::class, [
                'choices' => [
                    'ingredient 1 ' => json_decode('{ "id":2, "name":"ingredient 2 ", "price":"30" }'),
                    'ingredient 2 ' => json_decode('{ "id":2, "name":"ingredient 2 ", "price":"30" }'),
                    'ingredient 3' => json_decode('{ "id":3, "name":"ingredient 3 ", "price":"20" }'),
                    'ingredient 4 ' => json_decode('{ "id":3, "name":"ingredient 4 ", "price":"10" }')],
                    'expanded' =>true,
                    'required' =>true,
                    'multiple' => true
            ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
