<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassInfoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testClassInfoStore()
    {
        $this->delete('/class_infos/1234');
        $response = $this->post('/accounts/',[
            'uid'=>'1234',
            'course_name'=>'cn',
            'teachers'=>'123',
            'semester'=>'123',
        ],[
            'Accept'=>'application/json'
        ]);

        $response->assertStatus(200);
    }
    public function testClassInfoRetrieve()
    {
        $response = $this->get('/class_infos/1234',[
            'Accept'=>'application/json'
        ]);

        $response->assertStatus(200);
    }
    public function testClassInfoUpdate()
    {
        $response = $this->patch('/class_infos/1234',[
            'course_name'=>'zh',
        ],[
            'Accept'=>'application/json'
        ]);

        $response->assertStatus(200);
    }
}
