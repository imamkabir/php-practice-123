<?php
private $balance;
    private $pinCode;

    public function __construct($startMoney, $pin) {
        $this->balance = $startMoney;
        $this->pinCode = $pin;
    }   