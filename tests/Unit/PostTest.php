<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * test for add a post.
     *
     * @return void
     */
    public function testAddPost()
    {
        DB::table('jeux')->insert([
            'nom'=>'Warhammer 40 000',
        ]);
        DB::table('factions')->insert([
            'nom'=>'Adepta Soritas',
            'jeu_id' => 1
        ]);
        DB::table('roles')->insert([
            'role'=>'user',
        ]);
        DB::table('users')->insert([
            'pseudo' => 'TEST',
            'email' => 'test@test.fr',
            'imageprofil' => 'avatar.jpg',
            'password' => 'Azerty123!',
        ]);

        $this->assertEquals(0, Post::count());

        $data = [
            'content' => 'Ceci est un test de contenu',
            'titre' => 'Ceci est un test de titre',
            'faction_id' => 1,
            'user_id' => 1,
        ];
        $user = User::first();
        $this->actingAs($user);
        $this->json('POST', 'posts', $data);
        $this->assertEquals(1, Post::count());
        $post = Post::first();

        $this->assertEquals($data['content'], $post->content);
        $this->assertEquals($data['titre'], $post->titre);
        $this->assertEquals($data['faction_id'], $post->faction_id);
        $this->assertEquals($data['user_id'], $post->user_id);
    }
}
