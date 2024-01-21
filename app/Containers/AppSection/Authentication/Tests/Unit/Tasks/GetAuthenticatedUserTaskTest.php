<?php

namespace App\Containers\AppSection\Authentication\Tests\Unit\Tasks;

use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\AppSection\Authentication\Tests\UnitTestCase;
use App\Containers\AppSection\User\Data\Factories\UserFactory;
use App\Containers\AppSection\User\Models\User;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

#[Group('authentication')]
#[CoversClass(GetAuthenticatedUserTask::class)]
final class GetAuthenticatedUserTaskTest extends UnitTestCase
{
    public function testCanGetAuthenticatedUser(): void
    {
        $user = UserFactory::new()->createOne();
        auth()->setUser($user);
        $action = app(GetAuthenticatedUserTask::class);

        $foundUser = $action->run();

        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertSame($user->id, $foundUser->id);
    }
}