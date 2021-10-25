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
    public function testAddUser()
    {
        DB::table('roles')->insert([
            'role'=>'user',
        ]);
        
    

        $this->assertEquals(0, User::count());

        $data = [
            'pseudo' => 'UtilisateurTest',
            'email' => 'testmail@mailtest.fr',
            'password' => 'Azerty123!',
        ];

        $this->json('POST', 'users/create', $data);
        $this->assertEquals(1, User::count());
        $user = User::first();

        $this->assertEquals($data['pseudo'], $user->pseudo);
        $this->assertEquals($data['email'], $user->email);
        $this->assertEquals($data['password'], $user->password);
    }
}
