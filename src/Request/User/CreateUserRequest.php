<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\Request\User;

use BitBag\SyliusVueStorefrontPlugin\Command\User\CreateUser;
use BitBag\SyliusVueStorefrontPlugin\Model\Request\User\NewCustomer;
use Symfony\Component\HttpFoundation\Request;

final class CreateUserRequest
{
    /** @var NewCustomer */
    private $customer;

    /** @var string|null */
    private $password;

    public function __construct(Request $request)
    {
        $this->customer = $request->request->get('customer');
        $this->password = $request->request->get('password');
    }

    public static function fromHttpRequest(Request $request): self
    {
        return new self($request);
    }

    public function setCustomer(NewCustomer $customer): void
    {
        $this->customer = $customer;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getCommand(): CreateUser
    {
        return new CreateUser($this->customer, $this->password);
    }
}
