<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $image_urls = [
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg',
            'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg',
        ];

        return [
            'caption' => $this->faker->sentence(4),
            'image_url' => $this->faker->randomElement($image_urls),
            'author_id' => User::inRandomOrder()->first()->id
        ];
    }
}
