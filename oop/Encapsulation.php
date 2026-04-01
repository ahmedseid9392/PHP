<?php

class BankAccount {
    // Public - accessible from anywhere
    public $accountHolder;
    public $branchCode = "BANK001";
    
    // Private - accessible only within this class
    private $accountNumber;
    private $balance;
    private $pin;
    
    // Protected - accessible within this class and child classes
    protected $accountType;
    protected $interestRate;
    protected $transactionHistory = [];
    
    // Constructor
    public function __construct($holder, $accountNumber, $initialBalance, $pin, $accountType) {
        $this->accountHolder = $holder;
        $this->setAccountNumber($accountNumber);  // Using private method
        $this->balance = $initialBalance;
        $this->pin = $pin;
        $this->accountType = $accountType;
        $this->setInterestRate();  // Using protected method
        
        $this->addTransaction("Account opened with: $" . $initialBalance);
    }
    
    // Public methods - interface for the outside world
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            $this->addTransaction("Deposited: $" . $amount);
            return true;
        }
        return false;
    }
    
    public function withdraw($amount, $enteredPin) {
        // Using private method to verify PIN
        if ($this->verifyPin($enteredPin)) {
            if ($amount > 0 && $amount <= $this->balance) {
                $this->balance -= $amount;
                $this->addTransaction("Withdrew: $" . $amount);
                return true;
            }
        }
        return false;
    }
    
    public function getBalance($enteredPin) {
        // Controlled access to private property
        if ($this->verifyPin($enteredPin)) {
            return $this->balance;
        }
        return "Invalid PIN";
    }
    
    public function getAccountInfo() {
        // Combines public, private, and protected data
        return [
            'holder' => $this->accountHolder,        // public
            'accountType' => $this->accountType,      // protected
            'maskedNumber' => $this->getMaskedNumber() // private method
        ];
    }
    
    // Private methods - internal implementation details
    private function setAccountNumber($number) {
        // Validation logic
        if (strlen($number) == 10 && is_numeric($number)) {
            $this->accountNumber = $number;
        } else {
            throw new Exception("Invalid account number");
        }
    }
    
    private function verifyPin($enteredPin) {
        // PIN verification logic
        return $this->pin === $enteredPin;
    }
    
    private function getMaskedNumber() {
        // Only show last 4 digits
        return "****" . substr($this->accountNumber, -4);
    }
    
    private function calculateInterest() {
        // Complex interest calculation
        return $this->balance * ($this->interestRate / 100);
    }
    
    // Protected methods - available to child classes
    protected function setInterestRate() {
        switch($this->accountType) {
            case 'savings':
                $this->interestRate = 2.5;
                break;
            case 'checking':
                $this->interestRate = 0.5;
                break;
            case 'investment':
                $this->interestRate = 4.0;
                break;
            default:
                $this->interestRate = 1.0;
        }
    }
    
    protected function addTransaction($description) {
        $this->transactionHistory[] = [
            'date' => date('Y-m-d H:i:s'),
            'description' => $description,
            'balance' => $this->balance
        ];
    }
    
    protected function getTransactionHistory($limit = null) {
        if ($limit === null) {
            return $this->transactionHistory;
        }
        return array_slice($this->transactionHistory, -$limit);
    }
}

// Child class demonstrating protected access
class SavingsAccount extends BankAccount {
    private $minimumBalance = 500;
    
    public function __construct($holder, $accountNumber, $initialBalance, $pin) {
        // Call parent constructor with 'savings' type
        parent::__construct($holder, $accountNumber, $initialBalance, $pin, 'savings');
    }
    
    // Can access protected methods and properties
    public function addMonthlyInterest() {
        // Accessing protected method from parent
        $interest = $this->calculateInterest();  // Actually private - this would cause error!
        // Fix: We need to make calculateInterest() protected or create a protected method
        $this->balance += $interest;
        $this->addTransaction("Interest added: $" . $interest);
        return $interest;
    }
    
    // Override to add minimum balance check
    public function withdraw($amount, $enteredPin) {
        if (($this->getBalance($enteredPin) - $amount) < $this->minimumBalance) {
            return false;  // Would violate minimum balance
        }
        return parent::withdraw($amount, $enteredPin);
    }
    
    public function showHistory($count = 5) {
        // Accessing protected method from parent
        return $this->getTransactionHistory($count);
    }
}

// Fixed version with proper protected access
class FixedBankAccount {
    public $accountHolder;
    private $balance;
    private $pin;
    protected $accountType;
    protected $interestRate;
    protected $transactionHistory = [];
    
    public function __construct($holder, $initialBalance, $pin, $type) {
        $this->accountHolder = $holder;
        $this->balance = $initialBalance;
        $this->pin = $pin;
        $this->accountType = $type;
        $this->setInterestRate();
    }
    
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            $this->addTransaction("Deposited: $" . $amount);
            return true;
        }
        return false;
    }
    
    public function withdraw($amount, $enteredPin) {
        if ($this->verifyPin($enteredPin) && $amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            $this->addTransaction("Withdrew: $" . $amount);
            return true;
        }
        return false;
    }
    
    public function getBalance($enteredPin) {
        return $this->verifyPin($enteredPin) ? $this->balance : "Invalid PIN";
    }
    
    // Protected methods - accessible by child classes
    protected function setInterestRate() {
        switch($this->accountType) {
            case 'savings':
                $this->interestRate = 2.5;
                break;
            case 'checking':
                $this->interestRate = 0.5;
                break;
            default:
                $this->interestRate = 1.0;
        }
    }
    
    protected function calculateInterest() {
        return $this->balance * ($this->interestRate / 100);
    }
    
    protected function addTransaction($description) {
        $this->transactionHistory[] = [
            'date' => date('Y-m-d H:i:s'),
            'description' => $description,
            'balance' => $this->balance
        ];
    }
    
    protected function getTransactionHistory() {
        return $this->transactionHistory;
    }
    
    private function verifyPin($enteredPin) {
        return $this->pin === $enteredPin;
    }
}

class ProperSavingsAccount extends FixedBankAccount {
    private $minimumBalance = 500;
    
    public function __construct($holder, $initialBalance, $pin) {
        parent::__construct($holder, $initialBalance, $pin, 'savings');
    }
    
    public function addMonthlyInterest() {
        // Now this works - calculateInterest() is protected
        $interest = $this->calculateInterest();
        $this->deposit($interest);
        $this->addTransaction("Monthly interest added: $" . $interest);
        return $interest;
    }
    
    public function withdraw($amount, $enteredPin) {
        $currentBalance = $this->getBalance($enteredPin);
        if (is_numeric($currentBalance) && ($currentBalance - $amount) < $this->minimumBalance) {
            return false;
        }
        return parent::withdraw($amount, $enteredPin);
    }
    
    public function getRecentTransactions($count = 5) {
        $history = $this->getTransactionHistory();
        return array_slice($history, -$count);
    }
}

// Demonstration of encapsulation in action
echo "=== ENCAPSULATION DEMONSTRATION ===\n\n";

$account = new ProperSavingsAccount("John Doe", 5000, "1234");

// Public access - works
echo "Account Holder: " . $account->accountHolder . "\n";
$account->accountHolder = "John Smith";  // Can modify public property
echo "Updated Holder: " . $account->accountHolder . "\n\n";

// Private access - fails (will cause error if uncommented)
// echo $account->balance;           // Error: Cannot access private property
// $account->verifyPin("1234");      // Error: Cannot access private method

// Protected access - fails from outside class
// echo $account->interestRate;       // Error: Cannot access protected property
// $account->addTransaction("Test");  // Error: Cannot access protected method

// Public methods - proper interface
echo "Withdraw \$500: " . ($account->withdraw(500, "1234") ? "Success" : "Failed") . "\n";
echo "Balance: " . $account->getBalance("1234") . "\n\n";

echo "Adding interest...\n";
$interest = $account->addMonthlyInterest();
echo "Interest added: $" . $interest . "\n";
echo "New Balance: " . $account->getBalance("1234") . "\n\n";

echo "Recent Transactions:\n";
print_r($account->getRecentTransactions(3));

echo "\n--- Access Modifier Summary ---\n";
echo "PUBLIC:   accountHolder - accessible anywhere\n";
echo "PRIVATE:  balance, pin, verifyPin() - only within FixedBankAccount\n";
echo "PROTECTED: interestRate, addTransaction(), calculateInterest() - accessible in child classes\n";