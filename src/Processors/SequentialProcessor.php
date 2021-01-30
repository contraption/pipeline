<?php

namespace Contraption\Pipeline\Processors;

use Contraption\Collections\Contracts\Stackable;
use Contraption\Pipeline\Contracts\Processor;

class SequentialProcessor implements Processor
{
    public function process(Stackable $pipes, mixed $payload): mixed
    {
        $pipe = $pipes->shift();

        while ($pipe !== null) {
            $payload = $pipe($payload);
            $pipe    = $pipes->shift();
        }

        return $payload;
    }
}