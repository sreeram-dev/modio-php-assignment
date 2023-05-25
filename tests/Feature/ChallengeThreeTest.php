<?php

namespace Tests\Feature;

use App\Models\Log;
use App\Models\Token;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Helpers\Resources\TestTokenResource;
use Tests\TestCase;

class ChallengeThreeTest extends TestCase
{

    use RefreshDatabase;

    /**
     * test that creating a token passes as expected
     *
     * @return void
     */
    public function testCreateControllerPasses()
    {
        $user = $this->login();
        $response = $this->get('/api/tokens');

        $token = $user->tokens()->pluck('key')->first();
        $log = Log::where('key', $token)
            ->where('action', 'created')
            ->get()
            ->first();

        $tokenResponse = Token::where('key', $token)
            ->get()
            ->first();

        $resource = new TestTokenResource($tokenResponse);

        $response->assertStatus(201);
        $this->assertEquals(
            $response->content(),
            $resource->toJson()
        );
        $this->assertNotEmpty(
            $log
        );
        $this->assertEquals(
            $log->key,
            $token,
        );
    }

    /**
     * test that sending a good token fails at the middleware
     *
     * @return void
     */
    public function testDeleteRouteIsPassesTokenMiddleWare()
    {
        $user = $this->login();
        // not using a factory so this route must work first
        $this->get('/api/tokens');
        $token = $user->tokens()->pluck('key')->first();

        // this route should be protected by the middleware
        $response = $this->delete('/api/tokens', [
            'token' => $token,
        ]);

        $response->assertStatus(204);
    }

    /**
     * test that sending a bad token fails at the middleware
     *
     * @return void
     */
    public function testDeleteRouteIsProtectedByTokenMiddleWare()
    {
        $this->login();

        // this route should be protected by the middleware
        $response = $this->delete('/api/tokens', [
            'token' => 'sneakers',
        ]);

        $response->assertStatus(401);
    }

    /**
     * test that deleting a token passes as expected
     *
     * @return void
     */
    public function testDeleteControllerPasses()
    {
        $user = $this->login();
        // not using a factory so this route must work first
        $this->get('/api/tokens');
        $token = $user->tokens()->pluck('key')->first();

        $response = $this->delete('/api/tokens', [
            'token' => $token,
        ]);

        $log = Log::where('key', $token)
            ->where('action', 'deleted')
            ->get()
            ->first();

        $response->assertStatus(204);
        $this->assertNotEmpty(
            $log
        );
        $this->assertEquals(
            $log->key,
            $token,
        );
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
