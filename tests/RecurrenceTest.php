  <?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\CssSelector\CssSelector;
class RecurrenceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */



    public function testlinearReccurence()
{

    $this->visit('/index')
    	 ->click('Interactive Area')
    	 ->see('Enter in any numbers to the recurrence relation, and enter your initial term')
    	 ->type('1','firstnumber')
    	 ->type('1','secondnumber')
    	 ->type('1','thirdnumber')
    	 ->type('1','initialnumber')
    	 ->click('recsubmit')
    	 ->see('U(1) = ')
    	 ->see('U(2) = ')
    	 ->see('U(3) = ')
    	 ->see('U(4) = ');
         $this->type('1','sequence4');

  

}
}
