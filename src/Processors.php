<?php

namespace Contraption\Pipeline;

use Contraption\Pipeline\Processors\BasicProcessor;
use Contraption\Pipeline\Processors\DelicateProcessor;
use Contraption\Pipeline\Processors\SequentialProcessor;

final class Processors
{
    public static function basic(): BasicProcessor
    {
        return new BasicProcessor;
    }

    public static function sequential(): SequentialProcessor
    {
        return new SequentialProcessor;
    }

    public static function delicate(): DelicateProcessor
    {
        return new DelicateProcessor;
    }
}