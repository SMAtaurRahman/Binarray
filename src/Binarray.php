<?php

namespace Ataur\Binarray;

use Iterator;
use Countable;
use ArrayAccess;
use Ataur\Binarray\Drivers\DriverInterface;

class Binarray implements Iterator, ArrayAccess, Countable {

    protected $driver;
    protected $count;
    protected $position;

    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
        $this->count = 0;
        $this->position = 0;
    }

    public function count()
    {
        return $this->count;
    }

    public function current()
    {
        return $this->offsetGet($this->position);
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function offsetExists($offset)
    {
        return $offset > -1 && $offset < $this->count;
    }

    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->driver->get($offset);
        }

        return new \InvalidArgumentException('Undefined Index');
    }

    public function offsetSet($offset, $value)
    {
        $this->driver->set($value);
        $this->count++;
    }

    public function offsetUnset($offset)
    {
        $this->driver->remove($offset);
        $this->count--;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        if ($this->count > 0) {
            return $this->offsetExists($this->position);
        }

        return false;
    }

}
