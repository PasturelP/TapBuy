<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string|null
     */
    private $google_id;

	/**
	 * @var string|null
	 */
	private $google_access_token;

	/**
	 * @var string|null
	 */
	private $facebook_id;

	/**
	 * @var string|null
	 */
	private $facebook_access_token;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \DateTime
     */
    private $created;


	/**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set googleId.
     *
     * @param string|null $googleId
     *
     * @return User
     */
    public function setGoogleId($googleId = null)
    {
        $this->google_id = $googleId;

        return $this;
    }

    /**
     * Get googleId.
     *
     * @return string|null
     */
    public function getGoogleId()
    {
        return $this->google_id;
    }

	/**
	 * Set googleAccessToken.
	 *
	 * @param string|null $googleAccessToken
	 *
	 * @return User
	 */
	public function setGoogleAccessToken($googleAccessToken = null)
	{
		$this->google_access_token = $googleAccessToken;

		return $this;
	}

	/**
	 * Get googleAccessToken.
	 *
	 * @return string|null
	 */
	public function getGoogleAccessToken()
	{
		return $this->google_access_token;
	}

	/**
	 * Set facebookId.
	 *
	 * @param string|null $facebookId
	 *
	 * @return User
	 */
	public function setFacebookId($facebookId = null)
	{
		$this->facebook_id = $facebookId;

		return $this;
	}

	/**
	 * Get facebookId.
	 *
	 * @return string|null
	 */
	public function getFacebookId()
	{
		return $this->facebook_id;
	}

	/**
	 * Set facebookAccessToken.
	 *
	 * @param string|null $facebookAccessToken
	 *
	 * @return User
	 */
	public function setFacebookAccessToken($facebookAccessToken = null)
	{
		$this->facebook_access_token = $facebookAccessToken;

		return $this;
	}

	/**
	 * Get facebookAccessToken.
	 *
	 * @return string|null
	 */
	public function getFacebookAccessToken()
	{
		return $this->facebook_access_token;
	}

    /**
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
}
