<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Algorithmaths\User;
class LogInTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
 public function testNewUserLogIn()
{
	$user = factory(Algorithmaths\User::class)->create();
    $getUser = User::orderBy('id','desc')->first();
    $this->visit('/index')
	     ->click('loglink')
        ->type($getUser->username,'username')
        ->type('password','password')
		->press('Login')
		->see('Algorithmaths')
		->see('Welcome to Algorithmaths')
		->see('Logout');

}
 public function testAuthUserSeeTest()
{
	$user = factory(Algorithmaths\User::class)->create();
    $getUser = User::orderBy('id','desc')->first();
    $this->visit('/index')
	     ->click('loglink')
        ->type($getUser->username,'username')
        ->type('password','password')
		->press('Login')
		->see('Algorithmaths')
		->see('Welcome to Algorithmaths')
		->see('Logout')
		->click('Test Yourself')
		->see('Test Yourself!!');
}
 public function testAuthUserSeeReview()
{
	$user = factory(Algorithmaths\User::class)->create();
    $getUser = User::orderBy('id','desc')->first();
    $this->visit('/index')
	     ->click('loglink')
        ->type($getUser->username,'username')
        ->type('password','password')
		->press('Login')
		->see('Algorithmaths')
		->see('Welcome to Algorithmaths')
		->see('Logout')
		->click('Review')
		->see('Progress');
}

   public function testNewUserLogInFail()
{
    $this->visit('/index')
 		->click('loglink')
        ->type('christopher','username')
        ->type('chris','password')
		->press('Login')
		->see('auth failed')
		->dontSee('Chris')
		->dontSee('Logout');
}


}
