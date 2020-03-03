<?php

namespace PierreMiniggio\HTMLTrimmerTest;

use PHPUnit\Framework\TestCase;
use PierreMiniggio\HTMLTrimmer\HTMLTrimmer;

class HTMLTrimmerTest extends TestCase
{

    public function testABunchOfStuff()
    {
        $tests = [
            ['before' => 'test', 'after' => 'test'],
            ['before' => 'test<i>test2</i>', 'after' => 'test'],
            ['before' => 'test<i>test2</i> ', 'after' => 'test '],
            ['before' => 'test <i>test2</i>', 'after' => 'test '],
            ['before' => 'test test2', 'after' => 'test test2'],
            ['before' => '<h1>Titre</h1> blabla <p>text</p>', 'after' => ' blabla '],
        ];

        $trimmer = new HTMLTrimmer();

        foreach ($tests as $test) {
            $this->assertSame($test['after'], $trimmer->trimTagsAndRemoveTagContent($test['before']));
        }
    }
}
