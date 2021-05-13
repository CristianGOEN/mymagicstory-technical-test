<?php

declare(strict_types=1);


namespace MyMagicStory\App;


final class NoIntersectionFound extends \Exception
{
    protected $message = "Couldn't find the intersection!";
}