<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Enums;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
enum SourceOfFundsEnum: string
{
    case BANK_TRANSFER = '01';
    case GRANT_FROM_FAMILY_OR_FRIENDS = '02';
    case REDEMPTION_OF_INVESTMENT_PRODUCTS = '03';
    case ALLOWANCE_FOR_FAMILY_MAINTENANCE = '04';
    case LOAN = '05';
    case SALARY = '06';
    case REAL_ESTATE = '07';
    case REVENUE = '08';
}
