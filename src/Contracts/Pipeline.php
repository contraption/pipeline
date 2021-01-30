<?php

namespace Contraption\Pipeline\Contracts;

interface Pipeline
{
    public function add(callable $pipe): static;

    public function run(mixed $payload, ?Processor $processor = null): mixed;
}