<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: SellingPartnerApi\Generator\Generators\RequestGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInboundV20240320\Requests;

use Exception;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FBAInboundV20240320\Dto\CreateMarketplaceItemLabelsRequest;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\CreateMarketplaceItemLabelsResponse;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\ErrorList;

/**
 * createMarketplaceItemLabels
 */
class CreateMarketplaceItemLabels extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  CreateMarketplaceItemLabelsRequest  $createMarketplaceItemLabelsRequest  The `createMarketplaceItemLabels` request.
     */
    public function __construct(
        public CreateMarketplaceItemLabelsRequest $createMarketplaceItemLabelsRequest,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/inbound/fba/2024-03-20/items/labels';
    }

    public function createDtoFromResponse(Response $response): CreateMarketplaceItemLabelsResponse|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200 => CreateMarketplaceItemLabelsResponse::class,
            400, 404, 500, 403, 413, 415, 429, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json());
    }

    public function defaultBody(): array
    {
        return $this->createMarketplaceItemLabelsRequest->toArray();
    }
}
