<?php

namespace App\Helper;

use ApiPlatform\Core\Validator\ValidatorInterface;
use Opis\JsonSchema\Errors\ErrorFormatter;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Opis\JsonSchema\Validator;
use App\Exception\JsonSchemaException;

class JsonRequestHelper
{
    private string $PATH_SCHEMA;
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;
    private LoggerInterface $logger;
    private Validator $jsonValidator;

    public function __construct(string $PATH_SCHEMA, SerializerInterface $serializer, ValidatorInterface $validator, LoggerInterface $logger)
    {
        $this->PATH_SCHEMA = $PATH_SCHEMA;
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->logger = $logger;
        $this->jsonValidator = new Validator();
    }

    public function handleRequest($rawData, string $schema, ?string $class, $entity = null)
    {
        $jsonData = json_decode($rawData);
        $jsonSchema = json_decode(file_get_contents($this->PATH_SCHEMA.$schema.'.json'));

        $result = $this->jsonValidator->validate($jsonData, $jsonSchema;
        if(!$result->isValid()){
            $err = "JSON does not validate. Violations:\n";
            $formatter = new ErrorFormatter();
            $errors = $formatter->formatKeyed($result->error());
            foreach ($errors as $k => $error){
                $err .= spritf("[%s] %s\n", $k, implode(', ', $error));
            }
            $this->logger->error($err);
            throw new JsonSchemaException(400, 'Invalid request content.');
        }

        if(null === $class){
            return true;
        }

        $context = [];
        if(null !== $entity){

            $context[AbstractNormalizer::OBJECT_TO_POPULATE] = $entity;
        }
        $objData = $this->serializer->deserialize($rawData, $class, 'json', $content);
        $errors = $this->validator->validate($objData);
        if(count($errors)){
            $err = "Entity does not validate. Violations:\n";
            foreach ($errors as $error){
                $err .= sprinf("[%s=%s] %s\n", $error->getPropertyPath(), $error->getIvalidValue(), $error->getMessage());
            }
            throw new JsonSchemaException(400, $err);
        }
        return $objData;
    }

}