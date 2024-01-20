<?php

namespace App\Containers\AppSection\Authorization\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class AttachPermissionsToUserRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => 'manage-permissions',
        'roles' => '',
    ];

    protected array $decode = [
        'id',
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'permissions_ids' => 'array|required',
            'permissions_ids.*' => 'exists:permissions,id',
            'id' => 'required|exists:users,id',
        ];
    }

    public function authorize(): bool
    {
        return $this->hasAccess();
    }
}
