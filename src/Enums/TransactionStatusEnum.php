<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Enums;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
enum TransactionStatusEnum: string
{
    case NEW = 'new';
    case HELD = 'held';
    case REVIEW = 'review';
    case PAYOUT = 'payout';
    case SENT = 'sent';
    case FINISHED = 'finished';
    case CANCELLED = 'cancelled';
}
