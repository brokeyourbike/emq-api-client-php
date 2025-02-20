<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Enums;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
enum RemitancePurposeEnum: string
{
    case FAMILY = '001-01';
    case CHARITY = '001-02';
    case PAYMENT_FOR_SERVICES = '002-02';
    case TRAVEL_EXPENSES = '003-01';
    case PERSONAL_ASSET_ALLOCATION = '004-01';
    case PAYMENT_FOR_GOODS = '005-01';
    case CAPITAL_TRANSFER = '006-01';
    case INVESTMENT = '006-02';
    case EMPLOYEE_PAYROLL = '007-01';
    case GOODS_TRADE = '008-01';
    case SERVICES_TRADE = '008-02';
    case RETURN_OF_EXPORT_TRADE = '008-03';
}
