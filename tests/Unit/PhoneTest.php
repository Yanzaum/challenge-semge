<?php

namespace Tests\Unit;

use App\Phone;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhoneTest extends TestCase
{
    /** @test */
    public function check_if_phone_columns_is_correct()
    {
        $phone = new Phone;

        $expected = [
            'phone',
            'user_id'
        ];

        $arrayCompared = array_diff($expected, $phone->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
