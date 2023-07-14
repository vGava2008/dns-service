<?php

namespace Vyacheslavhava\DnsService;

use InvalidArgumentException;

class DnsService implements DnsServiceInterface
{
    /**
     * @param string $host
     * @return array
     * @throws InvalidArgumentException
     */
    public function getDnsRecords(string $host): array
    {
        $this->validateHost($host);
        return $this->fetchDnsRecords(trim($host));
    }

    /**
     * Validate the host
     * @param string $host
     * @throws InvalidArgumentException
     */
    private function validateHost(string $host): void
    {
        $trimmedHost = trim($host);
        if (empty($trimmedHost)) {
            throw new InvalidArgumentException('Hostname cannot be empty.');
        }

        if (!preg_match('/^(?!:\/\/)(?:[\w-]+\.)+(?:[a-zA-Z]{2,})$/', $trimmedHost)) {
            throw new InvalidArgumentException('Invalid hostname format.');
        }

        $maxLength = 255;
        if (strlen($trimmedHost) > $maxLength) {
            throw new InvalidArgumentException('Hostname exceeds the maximum length.');
        }

    }

    /**
     * Fetch DNS records for the host
     * @param string $host
     * @return array
     */
    private function fetchDnsRecords(string $host): array
    {
        return dns_get_record($host);
    }
}
