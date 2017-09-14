# BaseConvert


#### Examples:


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

