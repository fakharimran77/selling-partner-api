<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: SellingPartnerApi\Generator\Generators\RequestGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInboundV0\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FBAInboundV0\Responses\ConfirmTransportResponse;

/**
 * confirmTransport
 */
class ConfirmTransport extends Request
{
    protected Method $method = Method::POST;

    /**
     * @param  string  $shipmentId  A shipment identifier originally returned by the createInboundShipmentPlan operation.
     */
    public function __construct(
        protected string $shipmentId,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/fba/inbound/v0/shipments/{$this->shipmentId}/transport/confirm";
    }

    public function createDtoFromResponse(Response $response): ConfirmTransportResponse
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200, 400, 401, 403, 404, 429, 500, 503 => ConfirmTransportResponse::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json());
    }
}
