<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;
    public function definition(): array
    {
        $name = $this->faker->sentence(5);
        $slug = Str::slug($name, '-');
        $userIds = User::pluck('id')->all();
        return [
            'slug' =>$slug,
            'name' => $name,
            'desc' => $this->faker->paragraph(2),
            'author' => $this->faker->name,
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
