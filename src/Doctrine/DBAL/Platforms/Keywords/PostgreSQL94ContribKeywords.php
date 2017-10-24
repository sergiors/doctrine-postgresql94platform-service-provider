<?php

namespace Sergiors\Silex\Doctrine\DBAL\Platforms\Keywords;

use Doctrine\DBAL\Platforms\Keywords\PostgreSQL92Keywords;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
class PostgreSQL94ContribKeywords extends PostgreSQL92Keywords
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'PostgreSQL94Contrib';
    }

    /**
     * {@inheritdoc}
     *
     * @link http://www.postgresql.org/docs/9.2/static/citext.html
     * @link http://www.postgresql.org/docs/9.4/static/functions-json.html
     */
    protected function getKeywords()
    {
        return array_merge(parent::getKeywords(), [
            'CITEXT',
            'JSONB',
        ]);
    }
}
