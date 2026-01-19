<?php

class SamsungTV {
    // 1. THE COMPLEX HARDWARE (Private)
    // The user should never see or touch these
    private function sendInfraredSignal() {
        echo "Sending 3888kHz infrared signal...\n";
    }

    private function adjustHardwareVoltage() {
        echo "Increasing speaker voltage...\n";
    }

    // 2. THE ABSTRACTED BUTTON (Public)
    // This is the ONLY thing the user sees.
    public function volumeUp() {
        // When they press the button, we handle the mess for them
        $this->sendInfraredSignal();
        $this->adjustHardwareVoltage();
        echo "TV Volume: [||  ] 20%\n";
    }
}
$remote = new SamsungTV();

// You don't call 'adjustHardwareVoltage()'. You don't have to!
// You just press the simple button.
$remote->volumeUp();

?>