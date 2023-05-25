<?php

namespace Tests\Feature;

use App\Models\Mod;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Helpers\Resources\TestModResource;
use Tests\TestCase;

class ChallengeTwoTest extends TestCase
{

    use RefreshDatabase;

    /**
     * test that the controller returns valid data for the mods route
     *
     * @return void
     */
    public function testIndexControllerPasses()
    {
        $response = $this->get('/api/mods');

        $resource = TestModResource::collection(Mod::with('user')->simplePaginate());

        $response->assertStatus(200);
        $this->assertEquals($resource->response()->content(), $response->content());
    }

    /**
     * test that successfully creates and relates to the current user
     *
     * @return void
     */
    public function testCreateControllerPasses()
    {
        $user = $this->login();

        $response = $this->post(
            '/api/mods',
            [
                'name' => 'Counter-Strike',
                'path' => 'https://www.moddb.com/mods/counter-strike',
            ]
        );
        $mod = Mod::where('name', 'Counter-Strike')
            ->where('path', 'https://www.moddb.com/mods/counter-strike')->with('user')->get(
            )->first();

        $resource = new TestModResource($mod);
        $response->assertStatus(201);
        $this->assertEquals(
            $resource->toJson(),
            $response->content());

        print_r($resource->response()->getData());
        $this->assertEquals(
            $resource->response()->getData()->user_id->id,
            $user->getId()
        );
        // assert relations
        $this->assertEquals(
            $user->getId(),
            $mod->user()->pluck('id')->first(),
        );
        $this->assertEquals(
            $user->mods()->pluck('id')->first(),
            $mod->getId(),
        );
    }

    /**
     * test that can't create a new mod with invalid data
     *
     * @return void
     */
    public function testCreateControllerFailsWithInvalidData()
    {
        $mod = [
            'name' => 'Steve Balmer',
            'path' => 01100100011001010111011001100101011011000110111101110000011001010111001001110011,
        ];
        $response = $this
            ->withHeaders(['Accept' => 'application/json'])
            ->post('/api/mods', $mod);

        $mod = Mod::where('name', 'Steve Balmer')->get()->first();

        $response->assertStatus(422);
        $this->assertNull($mod);
        $this->assertEquals($response->getContent(), '{"message":"The given data was invalid.","errors":{"path":["The path must be a string."]}}');
    }

    /**
     * login a user (no middleware as this is just a demo)
     *
     * @return User
     */
    private function login(): User
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        return $user;
    }
}
