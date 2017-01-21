<?php

namespace Kallencode\Wakatime\Test\Unit;

use Mockery;
use Datetime;
use PHPUnit_Framework_TestCase;
use Kallencode\Wakatime\Wakatime;
use Illuminate\Support\Collection;
use Kallencode\Wakatime\WakatimeClient;


class WakatimeTest extends PHPUnit_Framework_TestCase
{

    /** @var \WakatimeClient */
    protected $wakatimeClient;

    /** @var \Wakatime */
    protected $wakatime;

    /** @var \DateTime */
    protected $now;


    public function setUp()
    {
        $this->wakatimeClient = Mockery::mock(WakatimeClient::class);

        $this->wakatime = new Wakatime($this->wakatimeClient);

        $this->now = new Datetime('NOW');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    /** @test */
    public function it_can_fetch_user_durations()
    {

        $this->wakatimeClient
            ->shouldReceive('performRequest')
            ->once()
            ->andReturn(collect([
                'branches' => ['test-branch'],
                'data' => [
                    [
                        'dependencies' => ['Illuminate'],
                        'duration' => 500,
                        'is_debugging' => false,
                        'project' => 'laravel-wakatime',
                        'time' => 1484866800
                    ],
                    [
                        'dependencies' => [],
                        'duration' => 67.55,
                        'is_debugging' => false,
                        'project' => 'laravel-wakatime',
                        'time' => 1484910992.82
                    ]
                ]
            ]));

        $response = $this->wakatime->fetchUserDurations($this->now);

        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(count($response['data']), 2);
        $this->assertEquals($response['data'][0]['duration'], 500);
        $this->assertEquals($response['data'][0]['project'], 'laravel-wakatime');
        $this->assertEquals($response['data'][1]['duration'], 67.55);
        $this->assertEquals($response['data'][1]['project'], 'laravel-wakatime');
    }

}
