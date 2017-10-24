<?php

namespace Sergiors\Silex\Doctrine\DBAL\Platforms;

use Doctrine\DBAL\Platforms\PostgreSQL92Platform;
use Sergiors\Silex\Doctrine\DBAL\Platforms\Keywords\PostgreSQL94ContribKeywords;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class PostgreSQL94ContribPlatform extends PostgreSQL92Platform
{
    /**
     * {@inheritdoc}
     */
    public function getJsonbTypeDeclarationSQL(array $field)
    {
        return 'JSONB';
    }

    /**
     * {@inheritdoc}
     */
    public function getCitextTypeDeclarationSQL(array $field)
    {
        return 'CITEXT';
    }

    /**
     * {@inheritdoc}
     */
    protected function getReservedKeywordsClass()
    {
        return PostgreSQL94ContribKeywords::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function initializeDoctrineTypeMappings()
    {
        parent::initializeDoctrineTypeMappings();

        $this->doctrineTypeMapping = array_merge($this->doctrineTypeMapping, [
            'citext' => 'text',
            'jsonb' => 'json_array',
        ]);
    }
}
