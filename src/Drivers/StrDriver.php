<?php

namespace Ataur\Binarray\Drivers;

class StrDriver implements DriverInterface {

    protected $storage;
    protected $padding;

    public function __construct($size = 8)
    {
        $this->storage = '';
        $this->padding = $size;
    }

    public function set($value)
    {
        if (is_string($value) === false) {
            return new \InvalidArgumentException('Invalid Input! Should be string.');
        }

        $this->storage .= str_pad($value, $this->padding, ' ');
    }

    public function get(int $index)
    {
        return trim(substr($this->storage, $index * $this->padding, $this->padding));
    }

    public function remove(int $index)
    {
        $this->storage = substr($this->storage, 0, $index * $this->padding) . substr($this->storage, ($index * $this->padding) + $this->padding, (strlen($this->storage) - (($index * $this->padding) + $this->padding)));
    }

}
