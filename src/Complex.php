<?php

namespace App;

final class Complex
{
    private float $re;
    private float $im;

    public function __construct(float $re, float $im)
    {
        $this->re = $re;
        $this->im = $im;
    }

    public function add(Complex $a): Complex
    {
        return new self($this->getRe() + $a->getRe(), $this->getIm() + $a->getIm());
    }

    public function sub(Complex $a): Complex
    {
        return new self($this->getRe() - $a->getRe(), $this->getIm() - $a->getIm());
    }

    public function multiply(Complex $a): Complex
    {
        return new self(
            $this->getRe() * $a->getRe() - $this->getIm() * $a->getIm(),
            $this->getIm()*$a->getRe() +$this->getRe() * $a->getIm());
    }


    public function divide(Complex $a): Complex
    {
        if ($a->getRe() == 0 && $a->getIm() == 0) {
            throw new \DivisionByZeroError();
        }

        return new self(
            ($this->getRe() * $a->getRe() + $this->getIm() * $a->getIm()) / ($a->getRe() ** 2 + $a->getIm() ** 2),
            ($this->getIm()*$a->getRe() - $this->getRe() * $a->getIm()) /  ($a->getRe() ** 2 + $a->getIm() ** 2)
        );
    }

    /**
     * @return float
     */
    public function getIm(): float
    {
        return $this->im;
    }

    /**
     * @return float
     */
    public function getRe(): float
    {
        return $this->re;
    }
}