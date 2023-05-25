<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\Helpers\Resources\TestUserResource;
use Tests\TestCase;

class ChallengeOneTest extends TestCase
{

    use RefreshDatabase;

    /**
     * test that the controller has an api/users route
     *
     * @return void
     */
    public function testHasIndexRoute()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }

    /**
     * test that the controller has an api user wild card route
     *
     * @return void
     */
    public function testHasViewRoute()
    {
        $user = User::all()->first();
        $response = $this->get('/api/users/' . $user->id);
        $resource = new TestUserResource($user);

        $response->assertStatus(200);
        $this->assertEquals(
            $response->content(),
            $resource->toJson()
        );
    }

    /**
     * test that the controller has an api user wild card route
     *
     * @return void
     */
    public function testIndexControllerPasses()
    {
        $response = $this->get('/api/users');
        $resource = TestUserResource::collection(User::all());

        $response->assertStatus(200);
        $this->assertEquals(
            $response->content(),
            $resource->toJson()
        );
    }

    /**
     * test that can create a new user with valid data
     *
     * @return void
     */
    public function testCreateControllerPassesWithValidData()
    {
        $data = [
            'name' => 'Russ Hanneman',
            'email' => 'azurediamond@bash.org',
            'password' => 'hunter2',
        ];
        $response = $this->post('/api/users', $data);
        // find the newly created user
        $user = User::where('id', json_decode($response->content())->id)->get()->first();

        $response->assertStatus(201);
        $this->assertTrue(Hash::check('hunter2', $user->getAttribute('password')));
        $this->assertEquals(
            $response->content(),
            (new TestUserResource($user))->toJson()
        );
    }

    /**
     * test that can't create a new user with invalid data
     *
     * @return void
     */
    public function testCreateControllerFailsWithInvalidData()
    {
        $user = [
            'name' => 'Richard Hendricks',
            'email' => 1,
            'password' => false,
        ];
        $response = $this
            ->withHeaders(['Accept' => 'application/json'])
            ->post('/api/users', $user);

        $user = User::where('name', 'Richard Hendricks')->get()->first();

        $response->assertStatus(422);
        $this->assertNull($user);
        $this->assertEquals('{"message":"The given data was invalid.","errors":{"email":["The email must be a string.","The email must be a valid email address."],"password":["The password must be a string."]}}', $response->getContent(), );
    }
}
