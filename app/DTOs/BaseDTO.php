<?php

namespace App\DTOs;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionProperty;

class BaseDTO
{

    public function __construct(array $parameters = [])
    {
        $class = new ReflectionClass(static::class);

        $this->uuid = str_replace("-", "", Str::uuid()); //a default value for all table in db

        foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $reflectionProperty) {
            $property = $reflectionProperty->getName();
            $this->{$property} = $parameters[$property];
        }
    }
}
