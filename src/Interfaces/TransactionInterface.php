<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Interfaces;

use DateTime;
use BrokeYourBike\EMQ\Enums\SenderTypeEnum;
use BrokeYourBike\EMQ\Enums\SegmentEnum;
use BrokeYourBike\EMQ\Enums\DestinationEnum;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
interface TransactionInterface
{
    public function getReference(): string;
    public function getCurrency(): string;
    public function getAmount(): float;
    public function getCountry(): string;

    public function getSenderId(): string;
    public function getSenderSegment(): SegmentEnum;
    public function getSenderCountry(): string;
    public function getSenderFirstName(): string;
    public function getSenderLastName(): string;
    public function getSenderDOB(): ?DateTime;
    public function getSenderPhone(): ?string;

    public function getRecipientDestination(): DestinationEnum;
    public function getRecipientSegment(): SegmentEnum;
    public function getRecipientCountry(): string;
    public function getRecipientFirstName(): string;
    public function getRecipientLastName(): string;
    public function getRecipientBankCode(): ?string;
    public function getRecipientSwiftCode(): ?string;
    public function getRecipientAccountNumber(): ?string;
    public function getRecipientPhone(): ?string;
}
