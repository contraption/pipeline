<?php

namespace Contraption\Pipeline;

use Contraption\Collections\Collections;
use Contraption\Collections\Contracts\Stackable;
use Contraption\Pipeline\Contracts\Processor;

class Pipeline implements Contracts\Pipeline
{
    private Stackable $pipes;

    public function __construct()
    {
        $this->pipes = Collections::queue();
    }

    public function add(callable $pipe): static
    {
        $this->pipes->push($pipe);

        return $this;
    }

    public function run(mixed $payload, ?Processor $processor = null): mixed
    {
        return ($processor ?? Processors::basic())->process($this->pipes, $payload);
    }
}