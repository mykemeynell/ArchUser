<?php

namespace ArchLayerUser\Service\Contract;

use ArchLayer\Service\Contract\ServiceInterface;
use ArchLayerUser\Entity\Contract\UserRoleEntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface UserRoleServiceInterface.
 *
 * @package ArchLayerUser\Service\Contract
 */
interface UserRoleServiceInterface extends ServiceInterface
{
    /**
     * Create a user role.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \ArchLayerUser\Entity\Contract\UserRoleEntityInterface
     */
    public function create(ParameterBag $payload): UserRoleEntityInterface;

    /**
     * Update a user role entity. Match parameter is used to select column to match on.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     * @param string                                         $match
     *
     * @return bool
     */
    public function update(ParameterBag $payload, $match = 'id'): bool;

    /**
     * Delete a user role entity.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     *
     * @return bool
     */
    public function delete(UserRoleEntityInterface $entity): bool;

    /**
     * Get a role by name.
     *
     * @param string $name
     *
     * @return \ArchLayerUser\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model
     */
    public function findByName(string $name): UserRoleEntityInterface;
}
