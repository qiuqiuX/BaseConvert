<?php

namespace QiuQiuX\BaseConvert;

use InvalidArgumentException;

class BaseConvert
{
    const BASE62CODE = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    protected $baseNumber;
    protected $baseFormat;

    public function __construct($baseNumber, $baseFormat = 10)
    {
        if ($baseFormat > strlen(self::BASE62CODE) || $baseFormat < 2) {
            throw new InvalidArgumentException("Invalid argument {$baseFormat} given");
        }
        $this->baseNumber = $baseNumber;
        $this->baseFormat = $baseFormat;
    }

    public function convertTo($targetFormat)
    {
        return static::convert($this->baseNumber, $this->baseFormat, $targetFormat);
    }


    public static function convert($source, $sourceBase, $targetBase)
    {
        if ($sourceBase == $targetBase) {
            return $source;
        }

        $source = strval($source);

        if (function_exists('gmp_init')) {
            return gmp_strval(gmp_init($source, $sourceBase), $targetBase);
        } else {
            $sourceHashCode = substr(self::BASE62CODE, 0, $sourceBase);
            $result = 0;
            while($length = strlen($source)) {
                $result += strpos($sourceHashCode, $source{0}) * pow($sourceBase, $length - 1);
                $source = substr($source, 1);
            }

            $targetHashCode = substr(self::BASE62CODE, 0, $targetBase);
            $hash = '';
            do {
                $tmp = $result % $targetBase;
                $result = intval($result /$targetBase);
                $hash = $targetHashCode{$tmp} . $hash;
            } while($result > 0);

            return $hash;
        }
    }

}
 