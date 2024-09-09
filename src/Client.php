<?php

// Copyright (C) 2024 Ivan Stasiuk <ivan@stasi.uk>.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

namespace BrokeYourBike\EMQ;

use GuzzleHttp\ClientInterface;
use BrokeYourBike\ResolveUri\ResolveUriTrait;
use BrokeYourBike\HttpEnums\HttpMethodEnum;
use BrokeYourBike\HttpClient\HttpClientTrait;
use BrokeYourBike\HttpClient\HttpClientInterface;
use BrokeYourBike\HasSourceModel\SourceModelInterface;
use BrokeYourBike\HasSourceModel\HasSourceModelTrait;
use BrokeYourBike\EMQ\Responses\TransferResponse;
use BrokeYourBike\EMQ\Interfaces\TransactionInterface;
use BrokeYourBike\EMQ\Interfaces\ConfigInterface;
use BrokeYourBike\EMQ\Enums\SourceOfFundsEnum;
use BrokeYourBike\EMQ\Enums\SenderTypeEnum;
use BrokeYourBike\EMQ\Enums\SegmentEnum;
use BrokeYourBike\EMQ\Enums\RemitancePurposeEnum;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
class Client implements HttpClientInterface
{
    use HttpClientTrait;
    use ResolveUriTrait;
    use HasSourceModelTrait;

    private ConfigInterface $config;

    public function __construct(ConfigInterface $config, ClientInterface $httpClient)
    {
        $this->config = $config;
        $this->httpClient = $httpClient;
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    public function createTransfer(TransactionInterface $transaction): TransferResponse
    {
        $options = [
            \GuzzleHttp\RequestOptions::HEADERS => [
                'Accept' => 'application/json',
            ],
            \GuzzleHttp\RequestOptions::AUTH => [
                $this->config->getUsername(),
                $this->config->getPassword(),
            ],
            \GuzzleHttp\RequestOptions::JSON => [
                'destination_amount' => [
                    'currency' => $transaction->getCurrency(),
                    'units' => (string) $transaction->getAmount()
                ],
                'source' => [
                    'type' => SenderTypeEnum::PARTNER->value,
                    'segment' => $transaction->getSenderSegment()->value,
                    'country' => $transaction->getSenderCountry(),
                    'address_line' => $transaction->getSenderCountry(),
                    'address_city' => $transaction->getSenderCountry(),
                    'address_country' => $transaction->getSenderCountry(),
                    'nationality' => $transaction->getSenderCountry(),
                    'date_of_birth' => $transaction->getSenderDOB()->format('Y-m-d'),
                    'sender_id' => $transaction->getSenderId(),
                ],
                'destination' => [
                    'type' => $transaction->getRecipientDestination()->value,
                    'segment' => $transaction->getRecipientSegment()->value,
                    'country' => $transaction->getRecipientCountry(),
                    'address_country' => $transaction->getRecipientCountry(),
                    'address_city' => $transaction->getRecipientCountry(),
                    'address_line' => $transaction->getRecipientCountry(),
                ]
            ],
        ];

        if ($transaction->getSenderFirstName() && $transaction->getSenderSegment() === SegmentEnum::INDIVIDUAL) {
            $options[\GuzzleHttp\RequestOptions::JSON]['source']['legal_name_first'] = $transaction->getSenderFirstName();
        }
        if ($transaction->getSenderLastName() && $transaction->getSenderSegment() === SegmentEnum::INDIVIDUAL) {
            $options[\GuzzleHttp\RequestOptions::JSON]['source']['legal_name_last'] = $transaction->getSenderLastName();
        }
        if ($transaction->getSenderCompanyName() && $transaction->getSenderSegment() === SegmentEnum::BUSINESS) {
            $options[\GuzzleHttp\RequestOptions::JSON]['source']['company_name'] = $transaction->getSenderCompanyName();
            $options[\GuzzleHttp\RequestOptions::JSON]['source']['company_trading_name'] = $transaction->getSenderCompanyName();
        }
        if ($transaction->getSenderSegment() === SegmentEnum::BUSINESS) {
            $options[\GuzzleHttp\RequestOptions::JSON]['source']['company_registration_country'] = $transaction->getSenderCountry();
        }

        if ($transaction->getRecipientFirstName() && $transaction->getRecipientSegment() === SegmentEnum::INDIVIDUAL) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['legal_name_first'] = $transaction->getRecipientFirstName();
        }
        if ($transaction->getRecipientLastName() && $transaction->getRecipientSegment() === SegmentEnum::INDIVIDUAL) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['legal_name_last'] = $transaction->getRecipientLastName();
        }
        if ($transaction->getRecipientCompanyName() && $transaction->getRecipientSegment() === SegmentEnum::BUSINESS) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['company_name'] = $transaction->getRecipientCompanyName();
        }
        if ($transaction->getRecipientBankCode()) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['bank'] = $transaction->getRecipientBankCode();
        }
        if ($transaction->getRecipientSwiftCode()) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['swift_code'] = $transaction->getRecipientSwiftCode();
        }
        if ($transaction->getRecipientAccountNumber()) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['account_number'] = $transaction->getRecipientAccountNumber();
        }
        if ($transaction->getRecipientIBAN()) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['iban'] = $transaction->getRecipientIBAN();
        }
        if ($transaction->getRecipientWalletId()) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['ewallet_id'] = $transaction->getRecipientWalletId();
        }
        if ($transaction->getRecipientPartner()) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['partner'] = $transaction->getRecipientPartner();
        }
        if ($transaction->getRecipientPhone()) {
            $options[\GuzzleHttp\RequestOptions::JSON]['destination']['mobile_number'] = $transaction->getRecipientPhone();
        }

        if ($transaction instanceof SourceModelInterface){
            $options[\BrokeYourBike\HasSourceModel\Enums\RequestOptions::SOURCE_MODEL] = $transaction;
        }

        $response = $this->httpClient->request(
            HttpMethodEnum::PUT->value,
            (string) $this->resolveUriFor($this->config->getUrl(), "transfers/{$transaction->getReference()}"),
            $options
        );

        return new TransferResponse($response);
    }

    public function confirmTransfer(string $reference): TransferResponse
    {
        $options = [
            \GuzzleHttp\RequestOptions::HEADERS => [
                'Accept' => 'application/json',
            ],
            \GuzzleHttp\RequestOptions::AUTH => [
                $this->config->getUsername(),
                $this->config->getPassword(),
            ],
        ];

        $response = $this->httpClient->request(
            HttpMethodEnum::POST->value,
            (string) $this->resolveUriFor($this->config->getUrl(), "transfers/{$reference}/confirm"),
            $options
        );

        return new TransferResponse($response);
    }

    public function transferStatus(string $reference): TransferResponse
    {
        $options = [
            \GuzzleHttp\RequestOptions::HEADERS => [
                'Accept' => 'application/json',
            ],
            \GuzzleHttp\RequestOptions::AUTH => [
                $this->config->getUsername(),
                $this->config->getPassword(),
            ],
        ];

        $response = $this->httpClient->request(
            HttpMethodEnum::GET->value,
            (string) $this->resolveUriFor($this->config->getUrl(), "transfers/{$reference}"),
            $options
        );

        return new TransferResponse($response);
    }
}
