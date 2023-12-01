<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_todo_list_page(): void
    {
        $response = $this->get('/todo');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_todo_craete_page(): void
    {
        $response = $this->get('/todo/craete');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     */
    public function test_todo_store_error_message_data(): void
    {
        $response = $this->json('POST', '/todo', [
            'task_name' => '',
            'description' => ''
        ]);

        $response->assertStatus(422);
    }

    /**
     * A basic feature test example.
     */
    public function test_todo_store_data_in_db(): void
    {
        $response = $this->json('POST', '/todo', [
            'task_name' => 'New tasks',
            'description' => ''
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('todo');
    }
}
