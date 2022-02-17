<?php

namespace App\Entity;

use App\Service\DebugService;
use Cacofony\BaseClasse\BaseEntity;
use DateTime;
use Exception;
use JetBrains\PhpStorm\ArrayShape;

class User extends BaseEntity
{
    private int $id;
    private string $email;
    private string $password;
    private string $first_name;
    private string $last_name;
    private bool $is_admin;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    protected function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getLast_name(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLast_name(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirst_Name(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirst_name(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return bool
     */
    public function isIs_admin(): bool
    {
        return $this->is_admin;
    }

    /**
     * @param bool $is_admin
     */
    public function setIs_admin(bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    #[ArrayShape(['email' => "string", 'first_name' => "string", 'last_name' => "string", 'is_admin' => "bool"])]
    public function __toArray(): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'is_admin' => $this->is_admin
        ];
    }
}