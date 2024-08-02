<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Enums;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
enum DestinationEnum: string
{
    case WIRE = 'wire';
    case BANK_ACCOUNT = 'bank_account';
    case EWALLET = 'ewallet';
    case CASH_PICKUP = 'cash_pickup';
    case CASH_DELIVERY = 'cash_delivery';
}
