<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAccoutStore()
    {
        $this->delete('/accounts/test_id');
        $response = $this->post('/accounts/',[
            'student_id'=>'test_id',
            'credential'=>'demo_secret',
            'school_abbr'=>'PKU',
            'allow_email_notification'=>1,
            'allow_push_notification'=>1
        ],[
            'Accept'=>'application/json'
        ]);

        $response->assertStatus(200);
    }
    public function testAccoutRetrieve()
    {
        $response = $this->get('/accounts/test_id?credential=demo_secret',[
            'Accept'=>'application/json'
        ]);

        $response->assertStatus(200);
    }
    public function testAccoutUpdate()
    {
        $response = $this->patch('/accounts/test_id?credential=demo_secret',[
            'school_abbr'=>'THU',
        ],[
            'Accept'=>'application/json'
        ]);

        $response->assertStatus(200);
    }
}
