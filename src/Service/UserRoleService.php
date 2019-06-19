<?php

namespace ArchLayerUser\Service;

use ArchLayer\Service\Service;
use ArchLayerUser\Entity\Contract\UserRoleEntityInterface;
use ArchLayerUser\Repository\Contract\UserRoleRepositoryInterface;
use ArchLayerUser\Service\Contract\UserRoleServiceInterface;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class UserRoleService.
 *
 * @package ArchLayerUser\Service
 */
class UserRoleService extends Service implements UserRoleServiceInterface
{
    /**
     * UserRoleService constructor.
     *
     * @param \ArchLayerUser\Repository\Contract\UserRoleRepositoryInterface|\ArchLayer\Repository\RepositoryInterface $repository
     */
    function __construct(UserRoleRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Create a user role.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \ArchLayerUser\Entity\Contract\UserRoleEntityInterface
     */
    public function create(ParameterBag $payload): UserRoleEntityInterface
    {
        $attributes = Arr::only($payload->all(), $this->getRepository()->getModel()->getFillable());

        /** @var \ArchLayerUser\Entity\UserRoleEntity $user */
        $user = $this->getRepository()->create($attributes);
        $user->save();

        return $user;
    }

    /**
     * Update a user role entity. Match parameter is used to select column to match on.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     * @param string                                         $match
     *
     * @return bool
     */
    public function update(ParameterBag $payload, $match = 'id'): bool
    {
        return $this->getRepository()->builder()->where($match, $payload->get($match))->update(
            Arr::only($payload->all(), $this->getRepository()->getModel()->getFillable())
        );
    }

    /**
     * Delete a user role entity.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     *
     * @return bool
     */
    public function delete(UserRoleEntityInterface $entity): bool
    {
        return $this->getRepository()->delete($entity);
    }

    /**
     * Get a role by name.
     *
     * @param string $name
     *
     * @return \ArchLayerUser\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model
     */
    public function findByName(string $name): UserRoleEntityInterface
    {
        return $this->getRepository()->builder()->where('name', $name)->first();
    }
}
