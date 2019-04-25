# 判断同一平面上point是否在triangle内

## 应用场景

商家划定了服务范围， 判断用户所在位置是否在商家的服务范围等场景。

## 思路：

1. 假设点在三角形内， 则点将三角形分成3个小三角形；
2. 点分成的三个小三角形的面积之和一定等于原来三角形的面积；
3. 如果点不在三角形内， 点也可以与原来的三角形三个顶点组成三个三角形；
4. 点与三个顶点组成的三个三角形面积之和一定大于原三角形面积；
5. 上述问题改成求三角形面积的问题；
6. 考虑到php的float计算不精确的问题，比较的时候可能会存在误差，这里应该用精确计算函数BC Math；
7. 坐标仅支持两位小数。

## DEMO

```php

$triangle = [
    'a' => ['x'=>0.5,'y'=>0],
    'b' => ['x'=>4,'y'=>0],
    'c' => ['x'=>0,'y'=>6],
];

$point = ['x'=>0.1,'y'=>1];
$ret = PointInTriangle::judge($point, $triangle);
var_dump($ret);

$point = ['x'=>1,'y'=>1];
$ret = PointInTriangle::judge($point, $triangle);
var_dump($ret);

--
bool(false)
bool(true)

```