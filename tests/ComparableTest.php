<?php

namespace PHLAK\Twine\Tests;

use PHLAK\Twine;
use PHPUnit\Framework\TestCase;

class ComparableTest extends TestCase
{
    public function test_it_can_determine_if_it_equals_another_string_exactly()
    {
        $string = new Twine\Str('john pinkerton');

        $matches = $string->equals('john pinkerton');
        $differs = $string->equals('JoHN PiNKeRToN');

        $this->assertTrue($matches);
        $this->assertFalse($differs);
    }

    public function test_it_can_determine_if_it_equals_another_string_ignoring_case()
    {
        $string = new Twine\Str('john pinkerton');

        $matches = $string->equals('JoHN PiNKeRToN', Twine\Config\Equals::CASE_INSENSITIVE);
        $differs = $string->equals('BoB BeLCHeR', Twine\Config\Equals::CASE_INSENSITIVE);

        $this->assertTrue($matches);
        $this->assertFalse($differs);
    }

    public function test_it_can_determine_if_it_equals_another_instance_of_itself()
    {
        $string1 = new Twine\Str('john pinkerton');
        $string2 = new Twine\Str('JoHN PiNKeRToN');
        $string3 = new Twine\Str('BoB BeLCHeR');

        $this->assertTrue($string1->equals(clone $string1));
        $this->assertFalse($string1->equals($string2));
        $this->assertTrue($string1->equals($string2, Twine\Config\Equals::CASE_INSENSITIVE));
        $this->assertFalse($string1->equals($string3, Twine\Config\Equals::CASE_INSENSITIVE));
    }

    public function test_it_can_determine_if_it_starts_with_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->startsWith('john'));
        $this->assertFalse($string->startsWith('pinkerton'));
    }

    public function test_it_can_determine_if_it_ends_with_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->endsWith('pinkerton'));
        $this->assertFalse($string->endsWith('john'));
    }

    public function test_it_can_determine_if_it_contains_a_string()
    {
        $string = new Twine\Str('john pinkerton');

        $this->assertTrue($string->contains('pink'));
        $this->assertFalse($string->contains('purple'));
    }
}
