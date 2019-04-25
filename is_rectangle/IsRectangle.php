<?php
/**
 * Created by PhpStorm.
 * User: kbworkingpro
 * Date: 2019/4/24
 * Time: 3:58 PM
 */

namespace code\is_rectangle;
/**
 * Class IsRectangle
 */
class IsRectangle
{
    public static function judge(array $rectangle):bool {

        //check rectangle
        if (!(isset($rectangle['a']['x']) && isset($rectangle['a']['y']) && isset($rectangle['b']['x']) && isset($rectangle['b']['y']) && isset($rectangle['c']['x']) && isset($rectangle['c']['y']) && isset($rectangle['d']['x']) && isset($rectangle['d']['y']))) {
            throw new InvalidArgumentException('四个点的坐标不完整', 101303);
        }

        $a = $rectangle['a'];
        $b = $rectangle['b'];
        $c = $rectangle['c'];
        $d = $rectangle['d'];

        $abPow = self::getDistancePow($a, $b);
        $acPow = self::getDistancePow($a, $c);
        $adPow = self::getDistancePow($a, $d);

        if ($acPow == bcadd($abPow , $adPow, 4) || ($acPow == abs(bcsub($abPow , $adPow, 4)))) {
            return true;
        }

        return false;
    }

    protected static function getDistancePow(array $a, array $b):string {
        $x1 = $a['x'];
        $y1 = $a['y'];
        $x2 = $b['x'];
        $y2 = $b['y'];

        $x1x2 = bcpow(bcsub($x1, $x2, 2), '2', 4);
        $y1y2 = bcpow(bcsub($y1, $y2, 2), '2', 4);

        return bcadd($x1x2 , $y1y2, 4);

    }
}

