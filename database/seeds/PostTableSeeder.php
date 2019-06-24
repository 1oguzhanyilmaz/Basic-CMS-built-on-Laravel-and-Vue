<?php

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = App\User::create([
            'name' => 'John Karlo',
            'email' => 'johnsci@mail.com',
            'password' => bcrypt('password')
        ]);

        $author2 = App\User::create([
            'name' => 'Jane',
            'email' => 'jane@mail.com',
            'password' => bcrypt('password')
        ]);

        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Economy'
        ]);

        $category4 = Category::create([
            'name' => 'Technology'
        ]);

        $category5 = Category::create([
            'name' => 'Science'
        ]);

        $category6 = Category::create([
            'name' => 'Biology'
        ]);

        $post1 = $author1->posts()->create([
            'title' => 'The standard Lorem Ipsum passage, used since the 1500s',
            'description' => 'Lorem Ipsum',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);

        $post2 = $author2->posts()->create([
            'title' => '1914 translation by H. Rackham',
            'description' => 'Translation',
            'content' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Post3',
            'description' => 'We relocated our office to a new designed garage',
            'content' => 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will',
            'category_id' => $category3->id,
            'user_id' => $author1->id,
            'image' => 'posts/3.jpg'
        ]);

        $post4 = $author2->posts()->create([
            'title' => '1914 translation by H. Rackham',
            'description' => 'Rackam',
            'content' => 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will',
            'category_id' => $category4->id,
            'user_id' => $author1->id,
            'image' => 'posts/4.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'Job'
        ]);

        $tag2 = Tag::create([
            'name' => 'Work'
        ]);

        $tag3 = Tag::create([
            'name' => 'Testing'
        ]);

        $tag4 = Tag::create([
            'name' => 'Function'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag4->id]);
        $post4->tags()->attach([$tag1->id, $tag2->id]);
    }
}
