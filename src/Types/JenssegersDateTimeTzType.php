<?php
/**
 * @link      http://github.com/zetta-repo/zetta-doctrineutil for the canonical source repository
 * @copyright Copyright (c) 2016 Zetta Code
 */

namespace Zetta\DoctrineUtil\Types;

use Jenssegers\Date\Date;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeTzType;

class JenssegersDateTimeTzType extends DateTimeTzType
{
    const JENSSEGERSDATETIMETZ = 'jenssegersdatetimetz';

    public function getName()
    {
        return static::JENSSEGERSDATETIMETZ;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $result = parent::convertToPHPValue($value, $platform);

        if ($result instanceof \DateTime) {
            return Date::instance($result);
        }

        return $result;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
