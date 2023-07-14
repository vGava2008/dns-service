<?php

namespace Vyacheslavhava\DnsService;

use InvalidArgumentException;

interface DnsServiceInterface
{
    /**
     * Get DNS records for the specified host
     *
     * @param string $host The host name
     * @return array The DNS records
     * @throws InvalidArgumentException If the host is invalid
     */
    public function getDnsRecords(string $host): array;
}
