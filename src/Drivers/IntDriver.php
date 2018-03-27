<?php

namespace Ataur\Binarray\Drivers;

class IntDriver implements DriverInterface {

    protected $binaries;

    public function __construct()
    {
        $this->binaries = '';
    }

    public function set($value)
    {
        if (is_int($value) === false) {
            return new \InvalidArgumentException('Invalid Input! Should be integer.');
        }

        $this->binaries .= pack('q', $value);
    }

    public function get(int $index)
    {
        return current(unpack('q', substr($this->binaries, $index * 8, 8)));
    }

    public function remove(int $index)
    {
        $this->binaries = substr($this->binaries, 0, $index * 8) . substr($this->binaries, ($index * 8) + 8, (strlen($this->binaries) - (($index * 8) + 8)));
    }

}
