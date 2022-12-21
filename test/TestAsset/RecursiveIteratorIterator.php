<?php

declare(strict_types=1);

namespace LaminasTest\Navigation\TestAsset;

use ArrayAccess;
use IteratorAggregate;
use RecursiveIterator;
use ReturnTypeWillChange;

/**
 * @template TIterator of IteratorAggregate|RecursiveIterator
 * @template-extends \RecursiveIteratorIterator<TIterator>
 */
class RecursiveIteratorIterator extends \RecursiveIteratorIterator
{
    /** @var list<string> */
    public array $logger = [];

    #[ReturnTypeWillChange]
    public function beginIteration()
    {
        $this->logger[] = 'beginIteration';
    }

    #[ReturnTypeWillChange]
    public function endIteration()
    {
        $this->logger[] = 'endIteration';
    }

    #[ReturnTypeWillChange]
    public function beginChildren()
    {
        $this->logger[] = 'beginChildren';
    }

    #[ReturnTypeWillChange]
    public function endChildren()
    {
        $this->logger[] = 'endChildren';
    }

    #[ReturnTypeWillChange]
    public function current()
    {
        $this->logger[] = parent::current()->getLabel();
    }
}
