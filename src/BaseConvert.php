<?php

namespace QiuQiuX\BaseConvert;

class BaseConvert
{
    const BASE62CODE = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    protected $baseNumber;
    protected $baseFormat;
    protected $baseCode;
    protected $isBaseNumberFromBaseCode;

    public function __construct($baseNumber, $baseFormat = 10, $baseCode = '', $isBaseNumberFromBaseCode = true)
    {
        $this->baseNumber = $baseNumber;
        $this->baseFormat = $baseFormat;
        $this->baseCode = $baseCode ? : self::BASE62CODE;
        $this->isBaseNumberFromBaseCode = $isBaseNumberFromBaseCode;
    }

    public function convertTo($targetFormat)
    {
        return static::convert($this->baseNumber, $this->baseFormat, $targetFormat, $this->baseCode, $this->isBaseNumberFromBaseCode);
    }


    public static function convert($baseNumber, $baseFormat, $targetFormat, $baseCode = '', $isBaseNumberFromBaseCode = true)
    {
        $baseCode = $baseCode ? : self::BASE62CODE;
        $baseCodeLen = strlen($baseCode);

        if ($baseFormat > $baseCodeLen || $baseFormat < 2 || $targetFormat > $baseCodeLen || $targetFormat < 2) {
            throw new InvalidBaseConvertException("Invalid argument format given");
        }

        $baseNumber = strval($baseNumber);

        $result = self::format2Decimal($baseNumber, $baseFormat, $baseCode, $isBaseNumberFromBaseCode);

        return self::decimal2XFormat($result, $targetFormat, $baseCode);
    }

    public static function decimal2XFormat($number, $targetFormat, $baseCode)
    {
        $hash = '';
        do {
            $tmp = $number % $targetFormat;
            $number = intval($number /$targetFormat);
            $hash = $baseCode{$tmp} . $hash;
        } while($number > 0);

        return $hash;
    }

    public static function format2Decimal($baseNumber, $baseFormat, $baseCode, $isBaseNumberFromBaseCode)
    {
        $length = strlen($baseNumber);
        $result = 0;
        $offset = 0;
        $baseCode = $isBaseNumberFromBaseCode ? $baseCode : self::BASE62CODE;
        while($offset < $length) {
            $result += strpos($baseCode, $baseNumber{$length - $offset - 1}) * pow($baseFormat, $offset);
            ++$offset;
        }

        return $result;
    }

}
 