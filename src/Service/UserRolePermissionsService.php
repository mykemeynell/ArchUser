<?php

namespace ArchLayerUser\Service;

use ArchLayer\Service\Service;
use ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface;
use ArchLayerUser\Repository\Contract\UserRolePermissionsRepositoryInterface;
use ArchLayerUser\Service\Contract\UserRolePermissionsServiceInterface;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class UserRolePermissionsService.
 *
 * @package ArchLayerUser\Service
 */
class UserRolePermissionsService extends Service implements UserRolePermissionsServiceInterface
{
    /**
     * UserRolePermissionsService constructor.
     *
     * @param \ArchLayerUser\Repository\Contract\UserRolePermissionsRepositoryInterface|\ArchLayer\Repository\RepositoryInterface $repository
     */
    function __construct(UserRolePermissionsRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Create a new user role permission.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface|\Illuminate\Database\Eloquent\Model
     */
    public function create(ParameterBag $payload): UserRolePermissionsEntityInterface
    {
        $attributes = Arr::only($payload->all(), $this->getRepository()->getModel()->getFillable());

        /** @var \ArchLayerUser\Entity\UserRolePermissionEntity $user */
        $permission = $this->getRepository()->create($attributes);
        $permission->save();

        return $permission;
    }

    /**
     * Update a user role permission. Matching on the $match parameter.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     * @param \Symfony\Component\HttpFoundation\ParameterBag                                                        $payload
     *
     * @return bool
     */
    public function update(UserRolePermissionsEntityInterface $entity, ParameterBag $payload): bool
    {
        return $entity->update(
            Arr::only($payload->all(), $this->getRepository()->getModel()->getFillable())
        );
    }

    /**
     * Delete a user role permission.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     *
     * @return bool
     */
    public function delete(UserRolePermissionsEntityInterface $entity): bool
    {
        return $this->getRepository()->delete($entity);
    }
}
