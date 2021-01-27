<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Class BasicEnum
 * @package App\Enums
 */
abstract class BasicEnum
{
    /**
     * @var null
     */
    private static $constCacheArray = null;

    public static function getConstants()
    {
        if (self::$constCacheArray == null) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if ( ! array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect                             = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }

        return self::$constCacheArray[$calledClass];
    }

    /**
     * getAssoc
     *
     * @return array
     */
    public static function getAssoc(): array
    {
        $return = [];
        foreach(array_flip(self::getConstants()) as $key=>$value)
        {
            $return[$key] = str_replace('_', ' ', ucfirst($value));
        }

        return $return;
    }

    /**
     * @param $name
     * @param bool $strict
     * @return bool
     */
    public static function isValidName($name, $strict = false): bool
    {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));

        return in_array(strtolower($name), $keys);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isValidValue($value): bool
    {
        $values = array_values(self::getConstants());

        return in_array($value, $values, $strict = true);
    }

    /**
     * @param $value
     * @return bool|false|int|string
     */
    public static function getName($value)
    {
        if (self::isValidValue($value)){
            return array_search($value, self::getConstants());
        }

        return false;
    }

    /**
     * @param $name
     * @return false|mixed
     */
    public static function getValue($name)
    {
        if (self::isValidName($name)){
            return $constants = self::getConstants()[$name];
        }

        return false;
    }
}
