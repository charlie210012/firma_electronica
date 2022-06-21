<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BusinessTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     /** @test */
    public function test_a_business_can_be_created()
    {
        $this->withoutExceptionHandling();

        $json = [];
        $json['name']="Empresas de agua";

        $data = json_decode(json_encode($json),true);

        $response = $this->post('api/business',$data);

        $response->assertStatus(200);
    }
}
