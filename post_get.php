<?php
// ============================================
// OOP + DRY IMPLEMENTATION
// ============================================

// 1. FORM FIELD CLASS - Represents a single form field (DRY: reusable field structure)
class FormField {
    private $name;
    private $label;
    private $type;
    private $value;
    
    public function __construct($name, $label, $type = 'text') {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = '';
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setValue($value) {
        $this->value = $value;
    }
    
    public function getValue() {
        return $this->value;
    }
    
    // DRY: Single method to render any field
    public function render() {
        return "
        <div>
            <label for='{$this->name}'>{$this->label}: </label>
            <input type='{$this->type}' name='{$this->name}' value='{$this->value}'>
        </div>";
    }
}

// 2. FORM CLASS - Manages the entire form (DRY: no repeated form logic)
class Form {
    private $fields = [];
    private $action;
    private $method;
    
    public function __construct($action, $method = 'POST') {
        $this->action = $action;
        $this->method = $method;
    }
    
    // DRY: Add fields dynamically instead of hardcoding
    public function addField(FormField $field) {
        $this->fields[] = $field;
    }
    
    public function getFields() {
        return $this->fields;
    }
    
    // DRY: Single method to render the entire form
    public function render() {
        $html = "<form action='{$this->action}' method='{$this->method}'>";
        
        foreach ($this->fields as $field) {
            $html .= $field->render();
        }
        
        $html .= "<input type='submit' value='Submit' name='submit'>";
        $html .= "</form>";
        
        return $html;
    }
}

// 3. FORM HANDLER CLASS - Processes submitted data (DRY: reusable submission logic)
class FormHandler {
    private $form;
    private $submittedData = [];
    
    public function __construct(Form $form) {
        $this->form = $form;
    }
    
    // DRY: Process all fields automatically, no manual $_POST checks
    public function handle() {
        if (isset($_POST['submit'])) {
            foreach ($this->form->getFields() as $field) {
                $fieldName = $field->getName();
                if (isset($_POST[$fieldName])) {
                    $this->submittedData[$fieldName] = $_POST[$fieldName];
                    $field->setValue($_POST[$fieldName]);
                }
            }
            return true;
        }
        return false;
    }
    
    public function getSubmittedData() {
        return $this->submittedData;
    }
    
    // DRY: Display results without repeating echo statements
    public function displayResults() {
        if (empty($this->submittedData)) {
            return '';
        }
        
        $output = "<div><h3>Submitted Data:</h3>";
        
        foreach ($this->submittedData as $key => $value) {
            $output .= "<p><strong>" . ucfirst($key) . ":</strong> " . htmlspecialchars($value) . "</p>";
        }
        
        $output .= "</div>";
        return $output;
    }
}

// ============================================
// INITIALIZE - DRY: Build form dynamically
// ============================================
$form = new Form($_SERVER['PHP_SELF'], 'POST');

// DRY: Add fields without repeating HTML
$form->addField(new FormField('name', 'Name', 'text'));
$form->addField(new FormField('age', 'Age', 'text'));
// Easy to add more fields: $form->addField(new FormField('email', 'Email', 'email'));

$handler = new FormHandler($form);
$handler->handle();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP + DRY Form</title>
</head>
<body>

    <h2>User Information Form</h2>
    
    <?= $handler->displayResults() ?>
    
    <?= $form->render() ?>

</body>
</html>