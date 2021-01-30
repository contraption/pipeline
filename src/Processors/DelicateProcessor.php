<?php

namespace Contraption\Pipeline\Processors;

use Contraption\Collections\Contracts\Stackable;
use Contraption\Pipeline\Contracts\Processor;

class DelicateProcessor implements Processor
{
    public function process(Stackable $pipes, mixed $payload): bool
    {
        $pipe = $pipes->shift();

        while ($pipe !== null) {
            $response = $pipe($payload);

            if (! $response) {
                return false;
            }

            $pipe = $pipes->shift();
        }

        return true;
    }
}