<?php

namespace Sergiors\Silex\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonArrayType;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
final class JsonbType extends JsonArrayType
{
    const JSONB = 'jsonb';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getJsonbTypeDeclarationSQL($fieldDeclaration);
    }

    public function getName()
    {
        return JsonbType::JSONB;
    }
}
