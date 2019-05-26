<?php

require './abstract_factory/Beginner.php';

use PHPUnit\Framework\TestCase;

class BeginnerTests extends TestCase
{
    private $beginner;

    protected function setUp(): void
    {
        $this->beginner = new Beginner(
            [
                "name" => "Tom",
                "level" => "BEGINNER",
            ],
            [
                'rings' => 1,
                'pullups' => 1
            ]
        );
    }

    protected function tearDown(): void
    {
        $this->beginner = null;
    }

    public function testCreatePlan()
    {
        $result = $this->beginner->createPlan();
        $this->assertArrayHasKey('member',$result);
        $this->assertArrayHasKey('rings',$result);
        $this->assertArrayHasKey('pullups',$result);
    }

}
