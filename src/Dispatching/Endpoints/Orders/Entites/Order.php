<?php

declare(strict_types=1);

namespace Appwilio\RussianPostSDK\Dispatching\Endpoints\Orders\Entites;

use Appwilio\RussianPostSDK\Core\ArrayOf;
use Appwilio\RussianPostSDK\Dispatching\DataAware;
use Appwilio\RussianPostSDK\Dispatching\Enum\MailRank;
use Appwilio\RussianPostSDK\Dispatching\Enum\MailType;
use Appwilio\RussianPostSDK\Dispatching\Enum\MailCategory;
use Appwilio\RussianPostSDK\Dispatching\Enum\PaymentMethodType;
use Appwilio\RussianPostSDK\Dispatching\Instantiator;
use Appwilio\RussianPostSDK\Dispatching\Entities\Tariff;
use Appwilio\RussianPostSDK\Dispatching\Entities\Address;
use Appwilio\RussianPostSDK\Dispatching\Entities\DeliveryTime;

final class Order
{
    use DataAware;

    public function getId(): string
    {
        return (string) $this->get('id');
    }

    public function getNumber(): string
    {
        return $this->get('order-num');
    }

    public function getWeight(): int
    {
        return $this->get('mass');
    }

    public function getTrackingNumber(): string
    {
        return $this->get('barcode');
    }

    public function getPaymentMethod(): PaymentMethodType
    {
        return new PaymentMethodType($this->get('payment-method'));
    }

    public function getVersion(): int
    {
        return (int) $this->get('version');
    }

    public function getMailType(): MailType
    {
        return new MailType($this->get('mail-type'));
    }

    public function getMailCategory(): MailCategory
    {
        return new MailCategory($this->get('mail-category'));
    }

    public function getMailRank(): MailRank
    {
        return new MailRank($this->get('mail-rank'));
    }

    public function hasCustomsDeclaration(): bool
    {
        return (bool) $this->get('customs-declaration');
    }

    public function getCustomsDeclaration(): ?CustomsDeclaration
    {
        return Instantiator::instantiate(CustomsDeclaration::class, $this->get('customs-declaration'));
    }

    /**
     * @return OrderItem[]|null
     */
    public function getItems()
    {
        return Instantiator::instantiate(new ArrayOf(OrderItem::class), $this->get('goods'));
    }

    public function getAddress(): Address
    {
        return Instantiator::instantiate(Address::class, [
            'address-type-to'     => $this->get('address-type-to'),
            'area-to'             => $this->get('area-to'),
            'building-to'         => $this->get('building-to'),
            'corpus-to'           => $this->get('corpus-to'),
            'hotel-to'            => $this->get('hotel-to'),
            'house-to'            => $this->get('house-to'),
            'letter-to'           => $this->get('letter-to'),
            'location-to'         => $this->get('location-to'),
            'office-to'           => $this->get('office-to'),
            'place-to'            => $this->get('place-to'),
            'region-to'           => $this->get('region-to'),
            'room-to'             => $this->get('room-to'),
            'slash-to'            => $this->get('slash-to'),
            'street-to'           => $this->get('street-to'),
            'mail-direct'         => $this->get('mail-direct'),
            'num-address-type-to' => $this->get('num-address-type-to'),
            'index-to'            => $this->data['index-to'] ?? $this->data['str-index-to'],
        ]);
    }

    public function getRecipient(): Recipient
    {
        return Instantiator::instantiate(Recipient::class, [
            'given-name'     => $this->get('given-name'),
            'middle-name'    => $this->get('middle-name'),
            'surname'        => $this->get('surname'),
            'tel-address'    => $this->get('tel-address'),
            'recipient-name' => $this->get('recipient-name'),
        ]);
    }

    public function getDeliveryTime(): ?DeliveryTime
    {
        return Instantiator::instantiate(DeliveryTime::class, $this->get('delivery-time'));
    }

    public function getGroundRate(): Tariff
    {
        return Instantiator::instantiate(Tariff::class, [
            'rate' => $this->get('ground-rate-wo-vat'),
            'vat' => $this->get('ground-vat'),
        ]);
    }

    public function getInsuranceRate(): Tariff
    {
        return Instantiator::instantiate(Tariff::class, [
            'rate' => $this->get('insr-rate-wo-vat'),
            'vat' => $this->get('insr-rate-with-vat') - $this->get('insr-rate-wo-vat'),
        ]);
    }

    public function getTotalRate(): Tariff
    {
        return Instantiator::instantiate(Tariff::class, [
            'rate' => $this->get('total-rate-wo-vat'),
            'vat' => $this->get('total-vat'),
        ]);
    }

    public function getEcomData(): ?EcomData
    {
        return Instantiator::instantiate(EcomData::class, $this->get('ecom-data'));
    }

    public function getFiscalData(): ?FiscalData
    {
        return Instantiator::instantiate(FiscalData::class, $this->get('fiscal-data'));
    }
}
