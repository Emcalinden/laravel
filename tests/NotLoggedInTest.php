<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotLoggedInTests extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testSeeloginButton()
    {
        $this->visit('/index')
             ->see('Log In');
    }
    public function testSeeRegisterButton()
    {
        $this->visit('/index')
             ->see('Register');
    }
    public function testSeeLogoutButton()
    {
        $this->visit('/index')
             ->dontsee('log out');
    }

    public function testExampleTab()
    {
        $this->visit('/index')
            ->click('Examples')
             ->see('Linear Example')
            ->see('Linear recurrence relation')
             ->see('Linear Proof By Mathematical Induction')
             ->see('Quadratic Example')
             ->see('Towers of Hanoi')
             ->see('Un = (n-1) +3, U(1)=1.');
    }

}
