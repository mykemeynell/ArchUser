<?php

namespace ArchLayerUser\Repository\Contract;

use ArchLayer\Repository\RepositoryInterface;
use ArchLayerUser\Entity\Contract\UserRoleEntityInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserRolePermissionsRepositoryInterface.
 *
 * @package ArchLayerUser\Repository\Contract
 */
interface UserRolePermissionsRepositoryInterface extends RepositoryInterface
{
    /**
     * Find a group of permissions that share the same name.
     *
     * @param string $permission
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUsingPermission(string $permission): Collection;

    /**
     * Find a group of permissions that share the same role ID.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRoleEntityInterface $role
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUsingRole(UserRoleEntityInterface $role): Collection;

    /**
     * Find a group of permission that share the same role via the Role ID.
     *
     * @param string $role_id
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findUsingRoleId(string $role_id): Collection;

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
    ): ?UserRoleEntityInterface;

    /**
     * Find a single permission using a Role ID and a permission name.
     *
     * @param string $role_id
     * @param string $permission
     *
     * @return \ArchLayerUser\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model|null
     */
    public function findUsingRoleIdAndPermission(string $role_id, string $permission): ?UserRoleEntityInterface;
}
