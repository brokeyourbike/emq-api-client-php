<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ\Responses;

use Spatie\DataTransferObject\Attributes\MapFrom;
use BrokeYourBike\DataTransferObject\JsonResponse;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
class TransferResponse extends JsonResponse
{
    public ?string $reason;
    public ?string $state;
    public ?string $reference;

    #[MapFrom('info.code')]
    public ?string $infoCode;

    #[MapFrom('info.state')]
    public ?string $infoState;
}

