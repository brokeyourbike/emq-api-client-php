<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Enums;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
enum TransactionInfoStatusEnum: string
{
    case UNCONFIRMED = 'unconfirmed';
    case CONFIRMED = 'confirmed';
    case PENDING = 'pending';
    case REVIEWING = 'reviewing';
    case QUEUED = 'queued';
    case ERROR = 'error';
    case SENT = 'sent';
    case PAID = 'paid';
    case REVERSAL = 'reversal';
    case CANCELLED = 'cancelled';
    case UNFUNDED = 'unfunded';
    case REJECTED = 'rejected';
}
