<?php

declare(strict_types=1);

namespace MyMagicStory\Tests;

use MyMagicStory\App\NoIntersectionFound;
use MyMagicStory\App\StringRepository;
use PHPUnit\Framework\TestCase;

final class StringRepositoryTest extends TestCase
{
    protected StringRepository $stringRepository;

    protected function setUp(): void
    {
        $this->stringRepository = new StringRepository();
    }

    /** @test
     * @throws NoIntersectionFound
     */
    public function it_should_return_exception_if_there_is_no_intersection_between_arrays(): void
    {
        $mmsArr = ['1,2,3,4,5', '6,7,8,9'];
        $this->expectException(NoIntersectionFound::class);
        $this->stringRepository->findIntersection($mmsArr);
    }

    /** @test */
    public function it_should_return_string_with_the_intersection_between_arrays(): void
    {
        $mmsArr = ['1,2,3,4,5', '4,5,6,7,8,9'];
        $expected = '4,5';
        $response = $this->stringRepository->findIntersection($mmsArr);
        $this->assertEquals($expected, $response);
    }

    /** @test */
    public function it_should_return_lesser_substring_from_A_that_contains_all_characters_in_B(): void
    {
        $mmsArr = ['ooobooddou', 'oud'];

        $expected = 'dou';
        $response = $this->stringRepository->findLessSubstring($mmsArr);
        $this->assertEquals($expected, $response);
    }

    /** @test */
    public function it_should_return_string_reversed(): void
    {
        $mms = 'The Magic of my Name';
        $expected = 'emaN ym fo cigaM ehT';
        $response = $this->stringRepository->reverseString($mms);
        $this->assertEquals($expected, $response);
    }
}