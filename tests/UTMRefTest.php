<?php

declare(strict_types=1);

namespace PHPCoord;

use PHPUnit\Framework\TestCase;

class UTMRefTest extends TestCase
{
    public function testToString(): void
    {
        $UTMRef = new UTMRef(699375, 5713970, 0, 'U', 30);
        $expected = '30U 699375 5713970';

        self::assertEquals($expected, $UTMRef->__toString());
    }

    public function testLatLng(): void
    {
        $UTMRef = new UTMRef(699388, 5713963, 0, 'U', 30);
        $LatLng = $UTMRef->toLatLng();
        $asOSGB36 = $LatLng->toOSGB36();

        $expected = '(51.54098, -0.12301)';

        self::assertEquals($expected, $asOSGB36->__toString());
    }

    public function testLatLngSouthernHemisphere(): void
    {
        $UTMRef = new UTMRef(334786, 6252080, 0, 'H', 56);
        $LatLng = $UTMRef->toLatLng();

        $expected = '(-33.85798, 151.21404)';

        self::assertEquals($expected, $LatLng->__toString());
    }
}
