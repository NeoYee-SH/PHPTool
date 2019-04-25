<?php
/**
 * Created by PhpStorm.
 * User: kbworkingpro
 * Date: 2019/4/24
 * Time: 2:58 PM
 */

namespace code\point_in_triangle;
/**
 * Class PointInTriangle
 */
class PointInTriangle
{
    public static function judge(array $p, array $triangle):bool
    {
        //check point
        if (!(isset($p['x']) && isset($p['y']))) {
            throw new InvalidArgumentException('点的坐标不完整', 101301);
        }

        //check triangle
        if (!(isset($triangle['a']['x']) && isset($triangle['a']['y']) && isset($triangle['b']['x']) && isset($triangle['b']['y']) && isset($triangle['c']['x']) && isset($triangle['c']['y']))) {
            throw new InvalidArgumentException('三角形的坐标不完整', 101302);
        }

        $areaPAB = self::triangleArea($p, $triangle['a'], $triangle['b']);
        $areaPBC = self::triangleArea($p, $triangle['b'], $triangle['c']);
        $areaPCA = self::triangleArea($p, $triangle['c'], $triangle['a']);
        $areaABC = self::triangleArea($triangle['a'], $triangle['b'], $triangle['c']) ;
        $areaAll = bcadd(bcadd($areaPAB, $areaPBC, 4), $areaPCA, 4);

        return $areaAll == $areaABC;
    }

    protected static function triangleArea(array $a, array $b, array $c):string {
        $x1 = $a['x'];
        $y1 = $a['y'];
        $x2 = $b['x'];
        $y2 = $b['y'];
        $x3 = $c['x'];
        $y3 = $c['y'];

        $ab = bcsub(bcmul($x1, $y2, 4) , bcmul($x2, $y1, 4), 4);
        $bc = bcsub(bcmul($x2, $y3, 4) , bcmul($x3, $y2, 4), 4);
        $ca = bcsub(bcmul($x3, $y1, 4) , bcmul($x1, $y3, 4), 4);

        $area = abs(bcadd(bcadd($ab, $bc, 4), $ca, 4)) / 2;

        return (string)$area;
    }

}