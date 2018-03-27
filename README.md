## What is Binarray?
> An alternative way to handle large volumn of integer or short string as array in memory efficient way.


**Wait, What???**

Let's say you need to have a large chunk of array containing millions of elements.  
First thing anyone would try is to do it with `array()`  

Whats wrong with `array()`?  

There's nothing wrong with `array()`, rather it's an awesome tool in php to get things done.   
But in reality, It's little bit more memory hungry. To have milions on element in class `array`, you would need hundreds of MB memory.  
Even though PHP7 restructured array internals, still they eat lots of memory.  

How will Binarray will help me?

Binarray is not actually array at all, It will store your values in a single variable and retrieve it when you want.
It does not provide any of other features that `array()` provides.
As it stores all data to a single variable, it tends to use less memory.

But will it be as fast as `array()`?

> There is no solution, only trade-offs

Binarray won't be as fast as array at all. As it will eat low memory, in return it will work much slower and eat up cpu usage a little bit more.  
But there will be some case where you don't care about slowing down few seconds, Binarray will be handy in that case.  

**I still can't find any reason to use Binarray instead of array**

Yeah, you can't use Binarray instead of array.  
Binarray has just set/get functionality, It can't do anything other than that. 


**You can use Binarray when -**  

* You need to have one-dimentional array containing millions of simple integer or string.

**You can't use Binarray when -**  

* You need anything else.

## Installation

```sh
composer require ataur/binarray
```

## Usage

```php
<?php

use Ataur\Binarray\Binarray;
use Ataur\Binarray\Drivers\IntDriver;
use Ataur\Binarray\Drivers\StrDriver;

/**
 * For storing only integers
 */
$binarray = new Binarray(new IntDriver());

$binarray[] = 1;
$binarray[] = 2;
$binarray[] = 3;
$binarray[] = 4;
$binarray[] = 5;

foreach($binarray as $key => $value){
    echo $value;
}


/**
 * For storing only strings within 10 characters
 */
$binarray = new Binarray(new StrDriver(10));

$binarray[] = 'John';
$binarray[] = 'Doe';
$binarray[] = 'Lizzy';
$binarray[] = 'Trump';
$binarray[] = 'Helen';

foreach($binarray as $key => $value){
    echo $value;
}

/**
 * To retrieve a value
 */
$value = $binarray[0];

/**
 * To remove a value
 */
unset($binary[0]);

/**
 * To count total elements
 */
$total = count($binarray);

```

## Limitations
* Binarray is one-dimentional, so you can't store multi-dimentional value or nesting.
* A single Binarray object can only store either integer or string. It can't contain both types.
* Binarray only contains functionality to add/get/remove value, nothing more.
* Removing a value will reset keys of whole array

## License

Binarray is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).