<?php

/**
 * 1. THE CONTRACT (Interface)
 * This ensures that every email tool we build HAS a 'send' button.
 */
interface MailerInterface {
    public function send($recipient, $message);
}

/**
 * 2. THE DRIVERS (Implementation)
 * These are the actual tools. They look different inside, 
 * but they both follow the contract.
 */
class GmailProvider implements MailerInterface {
    public function send($recipient, $message) {
        echo "LOG: Sending via GMAIL API to $recipient... [Success]\n";
    }
}

class OutlookProvider implements MailerInterface {
    public function send($recipient, $message) {
        echo "LOG: Sending via OUTLOOK Server to $recipient... [Success]\n";
    }
}

/**
 * 3. THE APP LOGIC (Dependency Injection)
 * This class is "The Chef." It doesn't go shopping for tools. 
 * It just waits for someone to hand it a MailerInterface tool.
 */
class StudentSignupSystem {
    private $mailer;

    // We "Inject" the dependency through the constructor
    public function __construct(MailerInterface $injectedMailer) {
        $this->mailer = $injectedMailer;
    }

    public function createAccount($email) {
        echo "SYSTEM: Creating record for $email in Database...\n";
        
        // This is Polymorphism: One line, many behaviors!
        $this->mailer->send($email, "Welcome to Iconic University!");
    }
}

/**
 * 4. THE CONFIGURATION (The One-Line Switch)
 * This is the ONLY place in your whole project where you choose the driver.
 */

// CHANGE THIS ONE LINE TO SWITCH THE ENTIRE SYSTEM:
$currentProvider = new GmailProvider(); 
// $currentProvider = new OutlookProvider(); 

// Put the tool into the system
$universityApp = new StudentSignupSystem($currentProvider);

// Run the task
$universityApp->createAccount("imam@university.edu");

?>