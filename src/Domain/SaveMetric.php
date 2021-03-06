<?php

declare(strict_types=1);

namespace Shippeo\Heimdall\Domain;

use Shippeo\Heimdall\Domain\Database\DatabaseIterator;
use Shippeo\Heimdall\Domain\Metric\Metric;

final class SaveMetric
{
    /** @var DatabaseIterator */
    private $databases;

    public function __construct(DatabaseIterator $databases)
    {
        $this->databases = $databases;
    }

    public function __invoke(Metric $metric): void
    {
        foreach ($this->databases as $database) {
            $database->store($metric);
        }
    }
}
