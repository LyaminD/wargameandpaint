<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * test for add a user.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $this->assertEquals(0, User::count());

        DB::table('roles')->insert([
            'role' => 'user',
        ]);

        $data = [
            'pseudo' => 'UtilisateurTest',
            'email' => 'test@mail.fr',
            'password' => 'Azerty123@',
            'password_confirmation' => 'Azerty123@',
        ];

        $this->json('POST', 'register', $data);
        $this->assertEquals(1, User::count());
        $user = User::first();

        $this->assertEquals($data['pseudo'], $user->pseudo);
        $this->assertEquals($data['email'], $user->email);
    }
}
