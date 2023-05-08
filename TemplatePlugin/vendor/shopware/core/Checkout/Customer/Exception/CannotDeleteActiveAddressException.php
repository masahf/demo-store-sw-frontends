<?php declare(strict_types=1);

namespace Shopware\Core\Checkout\Customer\Exception;

use Shopware\Core\Framework\ShopwareHttpException;
use Symfony\Component\HttpFoundation\Response;

class CannotDeleteActiveAddressException extends ShopwareHttpException
{
    public function __construct(string $id)
    {
        parent::__construct(
            'Customer address with id "{{ addressId }}" is an active address and cannot be deleted.',
            ['addressId' => $id]
        );
    }

    public function getErrorCode(): string
    {
        return 'CHECKOUT__CUSTOMER_ADDRESS_IS_ACTIVE';
    }

    public function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }
}
