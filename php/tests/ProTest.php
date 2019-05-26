<?php

require './abstract_factory/Pro.php';

use PHPUnit\Framework\TestCase;

class ProTests extends TestCase
{
    private $pro;

    protected function setUp(): void
    {
        $this->pro = new Pro(
            [
                "name" => "Lars",
                "level" => "Pro",
            ],
            [
                'rings' => 0,
                'pullups' => 0,
            ]
        );
    }

    protected function tearDown(): void
    {
        $this->pro = null;
    }

    public function testCreatePlan()
    {
        $result = $this->pro->createPlan();
        $this->assertArrayHasKey('member', $result);
        $this->assertArrayHasKey('rings', $result);
        $this->assertArrayHasKey('pullups', $result);
    }

}
