<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Enums;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
enum ChargeCodeEnum: string
{
    // Full Pay ensures the beneficiary receives the full value of the transfer, protected from intermediary or correspondent bank fees.
    case FULL_PAY = 'FP';
    // Payment will be instructed as shared (SHA).
    case SHARED = 'SHA';
}
