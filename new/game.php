<?php

class Game {
    private $gameName;
    private $gameType;

    public function __construct($gameName, $gameType) {
        $this->gameName = $gameName;
        $this->gameType = $gameType;
    }

    public function getGameName() {
        return $this->gameName;
    }

    public function getGameType() {
        return $this->gameType;
    }
}