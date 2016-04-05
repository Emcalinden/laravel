<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Algorithmaths\User;
class UserModelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserRegistration()
    {
       $user = factory(Algorithmaths\User::class)->create();
       $getUser = User::orderBy('id','desc')->first();
       
       $this->assertEquals($getUser->first_name, $user->first_name);

    }



}
