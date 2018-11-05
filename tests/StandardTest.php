<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use CICLOPSE\Standard;

final class StandardTest extends TestCase
{
    protected $test_standard;

    public function setUp()
    {
        $this->test_standard = new \CICLOPSE\Standard();
    }

    public function testStandardGetlinkReturnsCorrectlyFormattedHtmlLink()
    {
        $this->assertEquals(
            "<a class='testLink' href='test.com'>Test</a>",
            $this->test_standard->getLink('test.com', 'Test', 'testLink')
        );
    }

    public function testDecodeFunctionProperlyDecodesObject()
    {
        $encoded = $this->test_standard::encode($this->test_standard);
        $this->assertEquals(
            $this->test_standard,
            $this->test_standard::decode($encoded)
        );
    }

    public function testEncodeFunctionProperlyEncodesObject()
    {
        $encoded = $this->test_standard::encode($this->test_standard);
        $this->assertEquals(
            $this->test_standard::encode($this->test_standard),
            $encoded
        );
    }
}