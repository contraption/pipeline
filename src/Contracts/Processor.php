<?php

namespace Contraption\Pipeline\Contracts;

use Contraption\Collections\Contracts\Stackable;

interface Processor
{
    public function process(Stackable $pipes, mixed $payload): mixed;
}