<?php

namespace ArchLayerUser\Service;

use ArchLayer\Service\Service;
use ArchLayerUser\Entity\Contract\UserEntityInterface;
use ArchLayerUser\Repository\Contract\UserRepositoryInterface;
use ArchLayerUser\Service\Contract\UserServiceInterface;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class UserService.
 *
 * @package ArchLayerUser\Service
 */
class UserService extends Service implements UserServiceInterface
{
    /**
     * UserService constructor.
     *
     * @param \ArchLayerUser\Repository\Contract\UserRepositoryInterface|\ArchLayer\Repository\RepositoryInterface $repository
     */
    function __construct(UserRepositoryInterface $repository)
    {
        $this->setRepository($repository);
    }

    /**
     * Create a new user entity and save to the database.
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $payload
     *
     * @return \ArchLayerUser\Entity\Contract\UserEntityInterface
     */
    public function create(ParameterBag $payload): UserEntityInterface
    {
        $attributes = Arr::only($payload->all(), $this->getRepository()->getModel()->getFillable());

        /** @var \ArchLayerUser\Entity\UserEntity $user */
        $user = $this->getRepository()->create($attributes);
        $user->save();

        return $user;
    }

    /**
     * Update a user's attributes in the database. Match parameter is used to select column to match on.
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
     * Delete a user from the database.
     *
     * @param \ArchLayerUser\Entity\Contract\UserEntityInterface|\Illuminate\Database\Eloquent\Model $user
     *
     * @return bool
     */
    public function delete(UserEntityInterface $user): bool
    {
        return $this->getRepository()->delete($user);
    }
}
