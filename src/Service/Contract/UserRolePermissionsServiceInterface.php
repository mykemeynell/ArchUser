<?php

namespace ArchLayerUser\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface UserRolePermissionsServiceInterface.
 *
 * @package ArchLayerUser\Service\Contract
 */
interface UserRolePermissionsServiceInterface extends ServiceInterface
{
    /**
     * Create a new user role permission.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface|\Illuminate\Database\Eloquent\Model
     */
    public function create(ParameterBag $payload): UserRolePermissionsEntityInterface;

    /**
     * Update a user role permission. Matching on the $match parameter.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     * @param string                                         $match
     *
     * @return bool
     */
    public function update(ParameterBag $payload, $match = 'id'): bool;

    /**
     * Delete a user role permission.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRolePermissionsEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     *
     * @return bool
     */
    public function delete(UserRolePermissionsEntityInterface $entity): bool;
}
