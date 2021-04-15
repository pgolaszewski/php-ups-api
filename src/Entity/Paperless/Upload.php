<?php


namespace Ups\Entity\Paperless;

/**
 * @author Maciej Kotlarz <maciej.kotlarz@pixers.uk>
 * @copyright 2019 PIXERS Ltd
 */
class Upload
{
    /**
     * @var UserCreatedForm
     */
    protected $userCreatedForms;

    /**
     * @var string
     */
    protected $shipperNumber;

    /**
     * @param UserCreatedForm $userCreatedForm
     * @return $this
     */
    public function addUserCreatedForm(UserCreatedForm $userCreatedForm)
    {
        $this->userCreatedForms[] = $userCreatedForm;

        return $this;
    }

    /**
     * @return UserCreatedForm
     */
    public function getUserCreatedForms()
    {
        return $this->userCreatedForms;
    }

    /**
     * @param array $userCreatedForm
     * @return Upload
     */
    public function setUserCreatedForm(array $userCreatedForms)
    {
        $this->userCreatedForms = $userCreatedForms;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipperNumber()
    {
        return $this->shipperNumber;
    }

    /**
     * @param string $shipperNumber
     * @return Upload
     */
    public function setShipperNumber($shipperNumber)
    {
        $this->shipperNumber = $shipperNumber;

        return $this;
    }
}