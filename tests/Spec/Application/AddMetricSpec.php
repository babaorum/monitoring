<?php

declare(strict_types=1);

namespace Spec\Shippeo\Heimdall\Application;

use PhpSpec\ObjectBehavior;
use Shippeo\Heimdall\Application\AddMetric;
use Shippeo\Heimdall\Domain\Database\Database;
use Shippeo\Heimdall\Domain\Metric\Metric;

final class AddMetricSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AddMetric::class);
    }

    function it_invokes_save_metric(Database $database, Metric $metric)
    {
        $this->beConstructedWith([$database->getWrappedObject()]);

        $database->store($metric)->shouldBeCalled();

        $this->__invoke($metric);
    }
}
