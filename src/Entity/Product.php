<?php
namespace App\Entity;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", nullable = false, unique=true)
     */
    private int $id;

    /**
     * @ORM\Column(type="integer", nullable = false, unique=true
     */
    private int $shopId;

    /**
     * @ORM\Column(type="string", length = 20, nullable = false)
     */
    private string $category;

    /**
     * @ORM\Column(type="string", length = 30, nullable = false)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length = 180, nullable = false)
     */
    private string $description;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getShopId(): string
    {
        return $this->shopId;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function setShopId(string $shopId): self
    {
        $this->shopId = $shopId;
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
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
