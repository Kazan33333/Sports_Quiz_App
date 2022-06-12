<?php

class User
{
    private int $id_user;
    private string $nickname;
    private string $password;
    private string $email;

    public function __construct(int $id_user=null, string $nickname, string $password, string $email)
    {
        $this->id_user = $id_user;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->email = $email;
    }


    public function getIdUser(): int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}