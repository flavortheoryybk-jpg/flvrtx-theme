<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class RecipeSchema extends Composer
{
    protected static $views = [
        'layouts.app',
    ];

    public function with(): array
    {
        if (!is_singular('recipe')) {
            return [];
        }

        return [
            'recipeSchema' => $this->schema(),
        ];
    }

    protected function schema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Recipe',

            'name' => get_the_title(),

            'description' => get_the_excerpt(),

            'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),

            'author' => [
                '@type' => 'Person',
                'name' => get_the_author(),
            ],

            'prepTime' => 'PT' . get_field('prep_time') . 'M',

            'cookTime' => 'PT' . get_field('cook_time') . 'M',

            'totalTime' => 'PT' . get_field('total_time') . 'M',

            'recipeCuisine' => get_field('cuisine'),

            'recipeYield' => get_field('servings'),

            'nutrition' => [
                '@type' => 'NutritionInformation',
                'calories' => get_field('calories') . ' kcal',
            ],

            'recipeIngredient' => array_filter(
                array_map('trim', explode("\n", get_field('ingredients')))
            ),

            'recipeInstructions' => array_map(
                fn($step) => [
                    '@type' => 'HowToStep',
                    'text' => trim($step),
                ],
                array_filter(explode("\n", get_field('instructions')))
            ),
        ];

        if (get_field('youtube_url')) {

            $schema['video'] = [
                '@type' => 'VideoObject',
                'contentUrl' => get_field('youtube_url'),
            ];
        }

        return json_encode(
            $schema,
            JSON_UNESCAPED_SLASHES |
            JSON_UNESCAPED_UNICODE |
            JSON_PRETTY_PRINT
        );
    }
}