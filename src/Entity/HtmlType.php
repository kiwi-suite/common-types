<?php
/**
 * kiwi-suite/entity (https://github.com/kiwi-suite/common-types)
 *
 * @package kiwi-suite/common-types
 * @see https://github.com/kiwi-suite/common-types
 * @copyright Copyright (c) 2010 - 2018 kiwi suite GmbH
 * @license MIT License
 */

declare(strict_types=1);
namespace KiwiSuite\CommonTypes\Entity;

use Assert\Assertion;
use Doctrine\DBAL\Types\JsonType;
use Doctrine\DBAL\Types\StringType;
use KiwiSuite\Contract\Type\DatabaseTypeInterface;
use KiwiSuite\Entity\Type\AbstractType;

final class HtmlType extends AbstractType implements DatabaseTypeInterface
{
    /**
     * @param $value
     * @return array
     */
    protected function transform($value)
    {
        if (is_string($value)) {
            return [
                'html' => $value
            ];
        }
        return $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value()['html'];
    }

    /**
     * @return string
     */
    public function convertToDatabaseValue()
    {
        return $this->value();
    }

    /**
     * @return string
     */
    public static function baseDatabaseType(): string
    {
        return JsonType::class;
    }

    public static function serviceName(): string
    {
        return 'html';
    }
}