<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Enums;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
enum ErrorCodeEnum: string
{
    case VALIDATION_FAILED = 'validation_failed';
    case REQUIRED_NOT_PROVIDED = 'required_not_provided';
    case VALIDATION_NOT_ROUNDED = 'validation_not_rounded';
    case UNDER_LIMIT = 'under_limit';
    case OVER_LIMIT = 'over_limit';
    case AMOUNT_LESS_THAN_FEES = 'amount_less_than_fees';
    case TRANSFER_NOT_FOUND = 'transfer_not_found';
    case TRANSFER_EXPIRED = 'transfer_expired';
    case INVALID_CORRIDOR = 'invalid_corridor';
    case PERMISSION_DENIED = 'permission_denied';
    case NO_RATE = 'no_rate';
    case FEES_EXCHANGE_NOT_SUPPORTED = 'fees_exchange_not_supported';
    case REVIEW_EXCHANGE_NOT_SUPPORTED = 'review_exchange_not_supported';
    case CASH_PAYIN_EXCHANGE_NOT_SUPPORTED = 'cash_payin_exchange_not_supported';
    case KYC_CHECK_EXCHANGE_NOT_SUPPORTED = 'kyc_check_exchange_not_supported';
    case TRANSFER_ALREADY_CONFIRMED = 'transfer_already_confirmed';
    case INVALID_COUNTRY = 'invalid_country';
    case NOT_FOUND = 'not_found';
    case INVALID_DESTINATION = 'invalid_destination';
    case INVALID_PUBLIC_KEY = 'invalid_public_key';
    case MISSING_SIGNATURE = 'missing_signature';
    case INVALID_SIGNATURE = 'invalid_signature';
    case INVALID_SIGNATURE_BASE64 = 'invalid_signature_base64';
    case INVALID_DIGEST_METHOD = 'invalid_digest_method';
    case INTERNAL_ERROR = 'internal_error';
}
