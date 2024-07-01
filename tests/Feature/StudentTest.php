<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_students(): void
    {
        $response = $this->get('/api/students');
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'metadata' => [
                    "count",
                    "search",
                    "limit",
                    "offset",
                    "fields" => [],
                ],
                'students' => [
                    '*' => [
                        'id',
                        'firstname',
                        'lastname',
                        'birthdate',
                        'sex',
                        'address',
                        'year',
                        'course',
                        'section',
                    ]
                ]
            ])->assertJsonCount($response["metadata"]["limit"], 'students'); 
    }

}
