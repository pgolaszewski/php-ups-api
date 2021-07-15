<?php


namespace Ups\Entity\Paperless;

/**
 * PushToImageRepository
 */
class PushToImageRepository
{
    public const SHIPMENT_TYPE_SMALL_PACKAGE    = 1;
    public const SHIPMENT_TYPE_FREIGHT_SHIPMENT = 2;

    protected string $shipmentIdentifier;

    protected string $documentID;

    protected string $shipmentDateAndTime;

    protected int $shipmentType;

    protected string $customerContext = '';

    protected string $transactionIdentifier = '';

    protected string $trackingNumber;

    public function getShipmentIdentifier(): string
    {
        return $this->shipmentIdentifier;
    }

    public function setShipmentIdentifier(string $shipmentIdentifier): self
    {
        $this->shipmentIdentifier = $shipmentIdentifier;

        return $this;
    }

    public function getDocumentID(): string
    {
        return $this->documentID;
    }

    public function setDocumentID(string $documentID): self
    {
        $this->documentID = $documentID;

        return $this;
    }

    public function getShipmentDateAndTime(): string
    {
        return $this->shipmentDateAndTime;
    }

    public function setShipmentDateAndTime(string $shipmentDateAndTime): self
    {
        $this->shipmentDateAndTime = $shipmentDateAndTime;

        return $this;
    }

    public function getShipmentType(): int
    {
        return $this->shipmentType;
    }

    public function setShipmentType(int $shipmentType): self
    {
        $this->shipmentType = $shipmentType;

        return $this;
    }

    public function getCustomerContext(): string
    {
        return $this->customerContext;
    }

    public function setCustomerContext(string $customerContext): self
    {
        $this->customerContext = $customerContext;

        return $this;
    }

    public function getTransactionIdentifier(): string
    {
        return $this->transactionIdentifier;
    }

    public function setTransactionIdentifier(string $transactionIdentifier): self
    {
        $this->transactionIdentifier = $transactionIdentifier;

        return $this;
    }

    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }
}
