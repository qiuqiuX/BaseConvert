# BaseConvert


#### Examples:


    $cv = new \QiuQiuX\BaseConvert\BaseConvert(255, 10);
    // base 62 chars by default.(0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz)
    echo $cv->convertTo(8) , '<br/>';   // 377
    echo $cv->convertTo(9) , '<br/>';   // 313
    echo $cv->convertTo(10) , '<br/>';  // 255
    echo $cv->convertTo(11) , '<br/>';  // 212
    echo $cv->convertTo(16) , '<br/>';  // FF
    echo $cv->convertTo(26) , '<br/>';  // 9L

***

    $cv = new \QiuQiuX\BaseConvert\BaseConvert(255, 10, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', false);
        
    echo $cv->convertTo(8) , '<br/>';   // DHH
    echo $cv->convertTo(9) , '<br/>';   // DBD
    echo $cv->convertTo(10) , '<br/>';  // CFF
    echo $cv->convertTo(11) , '<br/>';  // CBC
    echo $cv->convertTo(16) , '<br/>';  // PP
    echo $cv->convertTo(26) , '<br/>';  // JV
    
***
    
    echo \QiuQiuX\BaseConvert\BaseConvert::format2Decimal('CFF', 10, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', true), '<br/>';   // 255
    
***
    
    $cv = new \QiuQiuX\BaseConvert\BaseConvert('CFF', 10, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', true);
    
    echo $cv->convertTo(8) , '<br/>';   // DHH
    echo $cv->convertTo(9) , '<br/>';   // DBD
    echo $cv->convertTo(10) , '<br/>';  // CFF
    echo $cv->convertTo(11) , '<br/>';  // CBC
    echo $cv->convertTo(16) , '<br/>';  // PP
    echo $cv->convertTo(26) , '<br/>';  // JV

