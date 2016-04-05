<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Algorithmaths\User;

class TestYourselfTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        
	$user = factory(Algorithmaths\User::class)->create();
    $getUser = User::orderBy('id','desc')->first();
    $this->visit('/index')
	     ->click('loglink')
	     ->seeInDatabase('user', ['username' => $user->username])
        ->type($getUser->username,'username')
        ->type('password','password')
		->press('Login')
		->see('Algorithmaths')
		->see('Welcome to Algorithmaths')
		->see('Logout')
		->click('Test Yourself')
		->see('Test Yourself!!')
		->select('0','question1')
		->select('0','question2')
		->select('1','question3')
		->select('1','question4')
		->select('0','question5')
		->see('Welcome to Algorithmaths')
		->click('Review')
		->see('2');
        //$this->select($value, $elementName)
    }
}
