<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    /**
     * @var App\Models\User
     */
    protected $user;

    public function setUp()
    {
        $this->user = $user = new User;
    }

    /**
     * @test
     */
    public function we_can_get_the_first_name()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals('Billy', $this->user->getFirstName());
    }

    public function testThatWeCanGetTheLastName()
    {
        $user = new User;

        $user->setLastName('Garrett');

        $this->assertEquals('Garrett', $user->getLastName());
    }

    public function testFullNameIsReturned()
    {
        $user = new User;
        $user->setFirstName('Billy');
        $user->setLastName('Garrett');

        $this->assertEquals('Billy Garrett', $user->getFullName());
    }

    public function testFirstNameAndLastNameAreTrimmed()
    {
        $user = new User;
        $user->setFirstName('      Billy  ');
        $user->setLastName(' Garrett    ');

        $this->assertEquals('Billy', $user->getFirstName());
        $this->assertEquals('Garrett', $user->getLastName());
    }

    public function testEmailAddressCanBeSet()
    {
        $user = new User;
        $user->setEmail('billy@ya.ru');

        $this->assertEquals('billy@ya.ru', $user->getEmail());
    }

    public function testEmailVariablesContainCorrectValues()
    {
        $user = new User;
        $user->setFirstName('Billy');
        $user->setLastName('Garrett');
        $user->setEmail('billy@ya.ru');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('Billy Garrett', $emailVariables['full_name']);
        $this->assertEquals('billy@ya.ru', $emailVariables['email']);
    }
}
