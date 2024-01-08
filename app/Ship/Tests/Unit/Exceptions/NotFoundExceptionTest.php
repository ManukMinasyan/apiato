<?php

namespace App\Ship\Tests\Unit\Exceptions;

use App\Ship\Exceptions\NotFoundException;
use App\Ship\Tests\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

#[Group('ship')]
#[CoversClass(NotFoundException::class)]
final class NotFoundExceptionTest extends TestCase
{
    public function testException(): void
    {
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The requested Resource was not found.');

        throw new NotFoundException();
    }
}