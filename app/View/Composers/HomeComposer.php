<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class HomeComposer extends Composer
{
    protected static $views = [
        'home.featured-recipe',
        'home.latest-recipes',
        'home.latest-learn',
    ];

    public function with(): array
    {
        return [
            'featuredRecipe' => $this->featuredRecipe(),
            'latestRecipes' => $this->latestRecipes(),
            'latestLearn' => $this->latestLearn(),
        ];
    }

    protected function featuredRecipe()
    {
        return new WP_Query([
            'post_type' => 'recipe',
            'posts_per_page' => 1,
            'post_status' => 'publish',
        ]);
    }

    protected function latestRecipes()
    {
        return new WP_Query([
            'post_type' => 'recipe',
            'posts_per_page' => 3,
            'post_status' => 'publish',
        ]);
    }

    protected function latestLearn()
    {
        return new WP_Query([
            'post_type' => 'learn',
            'posts_per_page' => 3,
            'post_status' => 'publish',
        ]);
    }
}