<?php

namespace App\Containers\AppSection\Authorization\Data\Repositories;

use App\Containers\AppSection\Authorization\Traits\AuthorizationRepositoryTrait;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

class RoleRepository extends ParentRepository
{
    use AuthorizationRepositoryTrait;

    protected $fieldSearchable = [
        'name' => '=',
        'display_name' => 'like',
        'description' => 'like',
    ];

    public function model(): string
    {
        return config('permission.models.role');
    }
}
