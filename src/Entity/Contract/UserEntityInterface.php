<?php

namespace ArchLayerUser\Entity\Contract;

use Carbon\Carbon;

/**
 * Interface UserEntityInterface.
 *
 * @property string         $first_name
 * @property string         $last_name
 * @property string         $email
 * @property string         $username
 * @property \Carbon\Carbon $email_verified_at
 * @property string         $password
 * @property string|null    $remember_token
 * @property string|null    $forgot_token
 * @property string|null    $api_token
 * @property string         $role_id
 * @property int            $is_root
 * @property int            $is_active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package ArchLayerUser\Entity\Contract
 */
interface UserEntityInterface
{
    /**
     * Get the display name of the user.
     *
     * @return string
     */
    public function getDisplayName();

    /**
     * Get the first name of the user.
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Get the last name of the user.
     *
     * @return string
     */
    public function getLastName();

    /**
     * Get the first initial of the user.
     *
     * @return string
     */
    public function getFirstInitial();

    /**
     * Get the last initial of the user.
     *
     * @return string
     */
    public function getLastInitial();

    /**
     * Get the user's email address.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get the user's username.
     *
     * @return null|string
     */
    public function getUsername();

    /**
     * Get the date and time that an email address was verified.
     *
     * @return \Carbon\Carbon|null
     */
    public function getEmailVerifiedAt();

    /**
     * Test if users email is verified.
     *
     * @return bool
     */
    public function isEmailVerified();

    /**
     * Test if the user is root.
     *
     * @return bool
     */
    public function isRoot();

    /**
     * Test if the user is active.
     *
     * @return bool
     */
    public function isActive();

    /**
     * Get the remember token.
     *
     * @return string|null
     */
    public function getRememberToken();

    /**
     * Get the forgot password token.
     *
     * @return string|null
     */
    public function getForgotPasswordToken();

    /**
     * Get the internal API token.
     *
     * @return string|null
     */
    public function getApiToken();
}
