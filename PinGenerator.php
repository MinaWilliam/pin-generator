<?php


class PinGenerator
{
    private int $max = 9999;
    private array $sequence = [];

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        $this->sequence[$this->max] = [];

        $i = 0;
        while ($i < $this->max) {
            $this->sequence[$i] = $i++;
        }

        shuffle($this->sequence);
    }

    public function print(): void
    {
        while (count($this->sequence)) {
            printf($this->generate() . "\n");
        }
    }

    public function generate(): string
    {
        $randomNumber = sprintf('%0'.strlen((string)$this->max).'u', array_pop($this->sequence));
        return $this->isSequential($randomNumber) ? $this->generate() : $randomNumber;
    }

    private function isSequential(string $pin): bool
    {
        for ($i = 0, $length = strlen($pin); $i < $length - 1; $i++) {
            if (abs((int)$pin[$i] - (int)$pin[$i + 1]) > 1) {
                return false;
            }
        }
        return true;
    }


    public function testPinShouldBeUnique(): bool
    {
        $results[$this->max] = [];
        while (count($this->sequence)) {
            $random = $this->generate();
            if (isset($results[$random])) {
                return false;
            }
            $results[$random] = true;
        }
        return true;
    }
}
