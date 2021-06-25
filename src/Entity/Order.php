<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", nullable = false, unique=true)
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable = false, unique=true)
     */
    private int $userId;

    /**
     * @ORM\Column(type="integer", nullable = false, unique=true)
     */
    private int $shopId;

    /**
     * @ORM\Column(type="integer", nullable = false, unique=true)
     */
    private int $adressId;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function getShopId(): int
    {
        return $this->shopId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getAddressId(): int
    {
        return $this->adressId;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setShopId(int $shopId): self
    {
        $this->shopId = $shopId;
        return $this;
    }

    public function setUserId(string $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function setAdressId(string $adressId): self
    {
        $this->adressId = $adressId;
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->id;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return null;
    }

    /**
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
