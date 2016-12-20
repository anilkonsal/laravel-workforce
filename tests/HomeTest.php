<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Services\HomeService;

class HomeTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Home');
    }

    public function testSeeInputForName()
    {
        $this->visit('/')
            ->see('Your Name');
    }
    public function testSeeInputForDateOfBirth()
    {
        $this->visit('/')
            ->see('Your DOB')
            ;
    }
    public function testValidateNameSubmittedIsShown()
    {
        $this->visit('/')
            ->type('Anil Konsal', 'name')
            ->type('13/02/1981', 'dob')
            ->press('Submit')
            ->seePageIs('/calculate')
            ->dontSee('Your Name')
            ->see('Hi Anil Konsal');
    }
    
    public function testValidateDateCalculation()
    {
        $homeService = new HomeService;
        $dob = '13/02/1981';
        
        $this->visit('/')
            ->type($dob, 'dob')
            ->press('Submit')
            ->seePageIs('/calculate')
            ->dontSee('Your Name')
            ->see('Hi')
            ->see($homeService->calculateAge($dob));
    }
}
