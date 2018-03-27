<?php

namespace Ataur\Binarray\Drivers;

interface DriverInterface {

    public function get(int $index);

    public function set($value);

    public function remove(int $index);
}
