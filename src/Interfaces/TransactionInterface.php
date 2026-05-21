<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Interfaces;

use BrokeYourBike\EMQ\Enums\ChargeCodeEnum;
use DateTime;
use BrokeYourBike\EMQ\Enums\SourceOfFundsEnum;
use BrokeYourBike\EMQ\Enums\SegmentEnum;
use BrokeYourBike\EMQ\Enums\RemitancePurposeEnum;
use BrokeYourBike\EMQ\Enums\RelationshipEnum;
use BrokeYourBike\EMQ\Enums\DestinationEnum;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
interface TransactionInterface
{
    public function getReference(): string;
    public function getCurrency(): string;
    public function getAmount(): float;

    public function getSenderId(): string;
    public function getSenderSegment(): SegmentEnum;
    public function getSenderCountry(): string;
    public function getSenderCity(): string;
    public function getSenderPostCode(): string;
    public function getSenderAddress(): string;
    public function getSenderCompanyName(): ?string;
    public function getSenderFirstName(): ?string;
    public function getSenderLastName(): ?string;
    public function getSenderDOB(): DateTime;
    public function getSenderPhone(): ?string;

    public function getRecipientDestination(): DestinationEnum;
    public function getRecipientChargeCode(): ?ChargeCodeEnum;
    public function getRecipientSegment(): SegmentEnum;
    public function getRecipientCountry(): string;
    public function getRecipientCity(): string;
    public function getRecipientPostCode(): string;
    public function getRecipientAddress(): string;
    public function getRecipientCompanyName(): ?string;
    public function getRecipientFirstName(): ?string;
    public function getRecipientLastName(): ?string;
    public function getRecipientBankCode(): ?string;
    public function getRecipientSwiftCode(): ?string;
    public function getRecipientAccountNumber(): ?string;
    public function getRecipientIBAN(): ?string;
    public function getRecipientWalletId(): ?string;
    public function getRecipientPartner(): ?string;
    public function getRecipientPhone(): ?string;

    public function getSourceOfFunds(): SourceOfFundsEnum;
    public function getRemittancePurpose(): RemitancePurposeEnum;
    public function getRelationship(): ?RelationshipEnum;
    public function getRelationshipDescription(): ?string;
}
