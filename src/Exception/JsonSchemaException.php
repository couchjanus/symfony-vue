<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class JsonSchemaException extends \HttpException implements HttpExceptionInterface
{

}