<?php

namespace Tests\Feature\GraphQL\Query;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersQueryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function graphql(string $query)
    {
        return $this->post('/graphql', [
            'query' => $query
        ]);
    }
}
