<?php


namespace Ups\Entity\Paperless;

/**
 * @author Maciej Kotlarz <maciej.kotlarz@pixers.uk>
 * @copyright 2019 PIXERS Ltd
 */
class Upload
{
    protected UserCreatedForm $userCreatedForms;

    protected string $shipperNumber;

    public function addUserCreatedForm(UserCreatedForm $userCreatedForm): self
    {
        $this->userCreatedForms[] = $userCreatedForm;

        return $this;
    }

    public function getUserCreatedForms(): UserCreatedForm
    {
        return $this->userCreatedForms;
    }

    public function setUserCreatedForm(array $userCreatedForms): self
    {
        $this->userCreatedForms = $userCreatedForms;

        return $this;
    }

    public function getShipperNumber(): string
    {
        return $this->shipperNumber;
    }

    public function setShipperNumber(string $shipperNumber): self
    {
        $this->shipperNumber = $shipperNumber;

        return $this;
    }
}
