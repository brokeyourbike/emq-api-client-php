<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Enums;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
enum RelationshipEnum: string
{
    case PARENTS = '01';
    case SIBLINGS = '02';
    case OTHER_RELATIVES = '03';
    case VENDOR = '04';
    case SUPPLIER = '05';
    case EMPLOYEE = '06';
    case SPOUSE = '07';
    case FRIENDS = '08';
    case EMPLOYER = '09';
    case CHILD = '10';
    case SELF = '11';
    case BUSINESS_PARTNER = '12';
    case AGENT = '13';
    case CREDITOR = '14';
    case OTHERS = '99';
}
