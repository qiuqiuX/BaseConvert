# BaseConvert


#### Examples:

    
    $cnv = new BaseConvert('z', 62);
	echo $cnv->convertTo(2);        // 111101
	echo $cnv->convertTo(8);        // 75
	echo $cnv->convertTo(10);       // 61
	echo $cnv->convertTo(16);       // 3d
	echo $cnv->convertTo(32);       // 1t
	echo $cnv->convertTo(36);       // 1p

---

	$cnv = new BaseConvert(4294967296, 10);
	echo $cnv->convertTo(2);        // 100000000000000000000000000000000
	echo $cnv->convertTo(8);        // 40000000000
	echo $cnv->convertTo(16);       // 100000000
	echo $cnv->convertTo(32);       // 4000000
	echo $cnv->convertTo(36);       // 1z141z4
	echo $cnv->convertTo(62);       // 4gfFC4

---

	$cnv = new BaseConvert('ffffffff', 16);
	echo $cnv->convertTo(2);        // 11111111111111111111111111111111
	echo $cnv->convertTo(8);        // 37777777777
	echo $cnv->convertTo(10);       // 4294967295
	echo $cnv->convertTo(32);       // 3vvvvvv
	echo $cnv->convertTo(36);       // 1z141z3
	echo $cnv->convertTo(62);       // 4gfFC3

---

	echo BaseConvert::convert('fffff', 16, 62);     // 4OmV
	echo BaseConvert::convert('4OmV', 62, 16);      // fffff

