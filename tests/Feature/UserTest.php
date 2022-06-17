<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function test_a_user_can_be_created()
    {
        $this->withoutExceptionHandling();

        $json = [];
        $json['name']="Carlos Andres Arevalo Cortes";
        $json['email']="carevalor@nexura.com";
        $json['password']=12345678;

        $data = json_decode(json_encode($json),true);

        $response = $this->post('api/user',$data);

        $response->assertStatus(200);
    }
}
