<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Interfaces;

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
    public function getSenderType(): string;
    public function getSenderSegment(): string;
    public function getSenderCountry(): string;
    public function getSenderFirstName(): string;
    public function getSenderLastName(): string;
    public function getSenderDOB(): ?string;
    public function getSenderPhone(): ?string;

    public function getRecipientType(): string;
    public function getRecipientSegment(): string;
    public function getRecipientCountry(): string;
    public function getRecipientFirstName(): string;
    public function getRecipientLastName(): string;
    public function getRecipientBankCode(): ?string;
    public function getRecipientSwiftCode(): ?string;
    public function getRecipientAccountNumber(): ?string;
    public function getRecipientPhone(): ?string;
}
