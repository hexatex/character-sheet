<?php

class Alignment extends Model
{
    /** @var Alignments|string */
    protected $code;

    /*
     * HasCode
     */
    /**
     * @return Alignments|string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param Alignments|string $alignment
     */
    public function setCode(string $alignment): void
    {
        $this->code = $alignment;
    }
}
