<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MyTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_user_exist(): void
    {
        $response = $this->get('/api/usuario/1');

        $response->assertStatus(200);
    }
}
