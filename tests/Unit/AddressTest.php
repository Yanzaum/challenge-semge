<?php

namespace Tests\Unit;

use App\Address;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase
{
    /** @test */
    public function check_if_address_columns_is_correct()
    {
        $address = new Address;

        $expected = [
            'street',
            'complement',
            'number',
            'city',
            'state',
            'country',
            'zipcode',
            'user_id'
        ];

        $arrayCompared = array_diff($expected, $address->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
