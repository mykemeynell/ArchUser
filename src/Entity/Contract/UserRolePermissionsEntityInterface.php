<?php

namespace ArchLayerUser\Entity\Contract;

/**
 * Interface UserRolePermissionsInterface.
 *
 * @property string $permission
 * @property string $role_id
 *
 * @package ArchLayerUser\Entity\Contract
 */
interface UserRolePermissionsEntityInterface
{
    /**
     * Get the name of the permission.
     *
     * @return string
     */
    public function getPermission(): string;

    /**
     * Get the role ID.
     *
     * @return string
     */
    public function getRoleId(): string;
}
