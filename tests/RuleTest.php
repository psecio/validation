<?php

namespace Psecio\Validation;

use PHPUnit\Framework\TestCase;

class RuleTest extends TestCase
{
    protected $rule;

    public function setUp()
    {
        $this->rule = new Rule('test');
    }
    public function tearDown()
    {
        unset($this->rule);
    }

    /**
     * Test the getting/setting of the checks
     * A normal call to getChecks() returns the array of checks not an object
     */
    public function testGetSetChecks()
    {
        $checks = [
            new \Psecio\Validation\Check\Alpha('test')
        ];
        $checkSet = new CheckSet($checks);

        $this->rule->setChecks($checkSet);
        $this->assertEquals($checks, $this->rule->getChecks());
    }

    /**
     * Testing the parsing of a rule string, both with a nromal and parameterized value
     * @group test1
     */
    public function testParseRuleString()
    {
        $string = 'required|integer[0,2]';
        $rule = new Rule('test', $string);

        $this->assertEquals(2, count($rule->getChecks()));
    }

    /**
     * Test that the "is required" check returned true when a Required check is present
     */
    public function testIsRequiredCheck()
    {
        $checkSet = new CheckSet([
            new \Psecio\Validation\Check\Required('test')
        ]);

        $this->rule->setChecks($checkSet);
        $this->assertTrue($this->rule->isRequired());

        $checkSet = new CheckSet([]);
        $this->rule->setChecks($checkSet);
        $this->assertFalse($this->rule->isRequired());
    }

    /**
     * Evaluate the rule when the checks return a valid (true) result
     */
    public function testExecuteValid()
    {
        $input = 'test';
        $checkSet = new CheckSet([
            new \Psecio\Validation\Check\Required('test')
        ]);

        $this->rule->setChecks($checkSet);
        $this->assertTrue($this->rule->execute($input));
        $this->assertTrue(empty($this->rule->getFailures()));
    }

    /**
     * Evaluate a rule when the checks return a failure (false)
     */
    public function testExecuteInvalid()
    {
        $input = 'test';
        $checkSet = new CheckSet([
            new \Psecio\Validation\Check\Integer('test')
        ]);

        $this->rule->setChecks($checkSet);
        $this->assertFalse($this->rule->execute($input));
        $this->assertEquals(1, count($this->rule->getFailures()));
    }

    /**
     * Test that an exception is thrown when a bad check type is given
     *
     * @expectedException \InvalidArgumentException
     */
    public function testParseInvalidCheckType()
    {
        $checks = 'badtype';
        $this->rule->parse($checks);
    }

    public function testParseCheckMappingValid()
    {
        $checks = 'array';
        $result = $this->rule->parse($checks);

        $this->assertInstanceOf('\Psecio\Validation\CheckSet', $result);
        $this->assertEquals(1, count($result));
        $this->assertInstanceOf('\Psecio\Validation\Check\Isarray', $result[0]);
    }

    public function testGetMessages()
    {
        $checks = 'array';
        $result = $this->rule->parse($checks);

        $this->assertEquals([], $this->rule->getMessages());
    }

    public function testGetMessage()
    {
        $checks = 'array';
        $result = $this->rule->parse($checks);
        $this->rule->setMessages(['message']);

        $this->assertEquals('message', $this->rule->getMessage(0));
        $this->assertNull($this->rule->getMessage(1));
    }

    public function testGetFailures()
    {
        $checks = 'array';
        $result = $this->rule->parse($checks);

        $this->assertEquals([], $this->rule->getFailures(true));
    }
}
