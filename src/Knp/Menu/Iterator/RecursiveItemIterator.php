<?php

namespace Knp\Menu\Iterator;

/**
 * Recursive iterator iterating on an item
 *
 * @extends \IteratorIterator<string, \Knp\Menu\ItemInterface, \Traversable<string, \Knp\Menu\ItemInterface>>
 * @implements \RecursiveIterator<string, \Knp\Menu\ItemInterface>>
 */
class RecursiveItemIterator extends \IteratorIterator implements \RecursiveIterator
{
    /**
     * @param \Traversable<string|int, \Knp\Menu\ItemInterface> $iterator
     */
    final public function __construct(\Traversable $iterator)
    {
        parent::__construct($iterator);
    }

    public function hasChildren(): bool
    {
        return 0 < \count($this->current());
    }

    /**
     * @return RecursiveItemIterator
     */
    #[\ReturnTypeWillChange]
    public function getChildren()
    {
        return new static($this->current());
    }
}
