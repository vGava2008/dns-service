<?php

namespace Vyacheslavhava\DnsService\Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Vyacheslavhava\DnsService\DnsService;

class DnsServiceTest extends TestCase
{
    public function testGetDnsRecords()
    {
        $dnsService = new DnsService();
        $domain = 'gmail.com';
        $records = $dnsService->getDnsRecords($domain);

        $this->assertIsArray($records);
        $this->assertNotEmpty($records);
    }

    public function testGetDnsRecordsInvalidDomain()
    {
        $this->expectException(InvalidArgumentException::class);

        $dnsService = new DnsService();
        $domain = 'com';
        $dnsService->getDnsRecords($domain);
    }
}

