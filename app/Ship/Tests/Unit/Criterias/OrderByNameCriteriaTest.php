<?php

namespace App\Ship\Tests\Unit\Criterias;

use App\Ship\Criterias\OrderByNameCriteria;
use App\Ship\Tests\Fakes\TestUserFactory;
use App\Ship\Tests\Fakes\TestUserRepository;
use App\Ship\Tests\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

#[Group('ship')]
#[CoversClass(OrderByNameCriteria::class)]
final class OrderByNameCriteriaTest extends TestCase
{
    public function testCriteria(): void
    {
        $modelB = TestUserFactory::new()->create(['name' => 'B']);
        $modelA = TestUserFactory::new()->create(['name' => 'A']);
        $modelC = TestUserFactory::new()->create(['name' => 'C']);

        $repository = app(TestUserRepository::class);
        $criteria = new OrderByNameCriteria();
        $repository->pushCriteria($criteria);

        $result = $repository->all();

        $this->assertSame($modelA->id, $result->first()->id);
        $this->assertSame($modelB->id, $result->get(1)->id);
        $this->assertSame($modelC->id, $result->last()->id);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->createTestUsersTable();
    }
}