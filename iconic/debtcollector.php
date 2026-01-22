<?php
// Debt Collector Interface
interface DebtCollector {
    public function collect(float $amount): float;
}

class CollectionAgency implements DebtCollector {
    public function collect(float $amount): float {
        // Real logic goes here
        return $amount * 0.5; 
    }
}