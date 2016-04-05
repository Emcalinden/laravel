<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Algorithmaths\User;

class AuthenticationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;
   public function testNewUserRegistration()
{
    $this->visit('/index')
    	 ->click('reglink')
         ->type('chris','first_name')
         ->type('morrow','last_name')
         ->type('christopher','username')
         ->type('chris','password')
		->press('Create')
		->see('Algorithmaths')
	 ->seeInDatabase('user', ['username' => 'christopher']);

}

   public function testNewUserRegistrationFail()
{
    $this->visit('/index')
    	 ->click('reglink')
         ->type('chris','first_name')
         ->type('morrow','last_name')
         ->type('chris','username')
		->press('Create')
		->see('Algorithmaths')
		->click('reglink')
	   ->notSeeInDatabase('user', ['username' => 'chris']);

}

}