<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\UserController;
use App\Models\User;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItGetsAUsersInformation()
    {
        $user = User::factory()->create();
        $response = $this->get('user/'. $user->id)->assertSuccessful();
        return $response;
    }
}
