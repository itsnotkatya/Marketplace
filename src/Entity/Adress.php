<?php

namespace App\Entity;

use App\Repository\AdressRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=AdressRepository::class)
 */
class Adress implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length = 30, nullable = false)
     */
    private string $street;

    /**
     * @ORM\Column(type="string", length = 30, nullable = false)
     */
    private string $city;

    /**
     * @ORM\Column(type="string", length = 30, nullable = false)
     */
    private string $state;

    /**
     * @ORM\Column(type="string", length = 30, nullable = false)
     */
    private string $postalcode;

    /**
     * @ORM\Column(type="string", length = 30, nullable = false)
     */
    private string $country;

    public function getId(): int
    {
        return $this->id;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->countryn;
    }

    public function getPostalCode(): string
    {
        return $this->postalcode;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function setPostalCode(string $postalcode): self
    {
        $this->postalcode = $postalcode;
        return $this;
    }

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];


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
