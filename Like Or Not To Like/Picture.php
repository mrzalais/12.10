<?php


class Picture
{
    private string $name;
    private int $likes;

    public function __construct(string $name, int $likes)
    {
        $this->name = $name;
        $this->likes = $likes;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLikes(): string
    {
        return $this->likes;
    }
}