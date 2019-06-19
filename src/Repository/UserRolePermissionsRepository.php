<?php

namespace ArchLayerUser\Repository;

use ArchLayer\Repository\Repository;
use ArchLayerUser\Entity\Contract\UserRoleEntityInterface;
use ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface;
use ArchLayerUser\Repository\Contract\UserRolePermissionsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserRolePermissionsRepository.
 *
 * @package ArchLayerUser\Repository
 */
class UserRolePermissionsRepository extends Repository implements UserRolePermissionsRepositoryInterface
{
    /**
     * UserRolePermissionsRepository constructor.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(UserRolePermissionsEntityInterface $entity)
    {
        $this->setModel($entity);
    }

    /**
     * Find a group of permissions that share the same name.
     *
     * @param string $permission
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUsingPermission(string $permission): Collection
    {
        return $this->builder()->where('permission', $permission)->get();
    }

    /**
     * Find a group of permissions that share the same role ID.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRoleEntityInterface $role
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUsingRole(UserRoleEntityInterface $role): Collection
    {
        return $this->builder()->where('role_id', $role->getKey())->get();
    }

    /**
     * Find a group of permission that share the same role via the Role ID.
     *
     * @param string $role_id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUsingRoleId(string $role_id): Collection
    {
        return $this->builder()->where('role_id', $role_id)->get();
    }

    /**
     * Find a single permission using a Role Entity and a permission name.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRoleEntityInterface $role
     * @param string                                                 $permission
     *
     * @return \ArchLayerUser\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingRoleAndPermission(
        UserRoleEntityInterface $role,
        string $permission
    ): ?UserRoleEntityInterface {
        return $this->builder()->where('role_id', $role->getKey())->where('permission', $permission)->first();
    }

    /**
     * Find a single permission using a Role ID and a permission name.
     *
     * @param string $role_id
     * @param string $permission
     *
     * @return \ArchLayerUser\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingRoleIdAndPermission(string $role_id, string $permission): ?UserRoleEntityInterface
    {
        return $this->builder()->where('role_id', $role_id)->when('permission', $permission)->first();
    }
}
