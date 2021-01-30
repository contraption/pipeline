<?php

namespace Contraption\Pipeline\Processors;

use Contraption\Collections\Contracts\Stackable;
use Contraption\Pipeline\Contracts\Processor;

class BasicProcessor implements Processor
{
    public function process(Stackable $pipes, mixed $payload): bool
    {
        $pipe = $pipes->shift();

        while ($pipe !== null) {
            $pipe($payload);
            $pipe = $pipes->shift();
        }

        return true;
    }
}