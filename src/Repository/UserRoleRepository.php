<?php

namespace ArchLayerUser\Repository;

use ArchLayer\Repository\Repository;
use ArchLayerUser\Entity\Contract\UserRoleEntityInterface;
use ArchLayerUser\Repository\Contract\UserRoleRepositoryInterface;

/**
 * Class UserRoleRepository.
 *
 * @package ArchLayerUser\Repository
 */
class UserRoleRepository extends Repository implements UserRoleRepositoryInterface
{
    /**
     * UserRoleRepository constructor.
     *
     * @param \ArchLayerUser\Entity\Contract\UserRoleEntityInterface|\Illuminate\Database\Eloquent\Model $entity
     */
    function __construct(UserRoleEntityInterface $entity)
    {
        $this->setModel($entity);
    }
}
