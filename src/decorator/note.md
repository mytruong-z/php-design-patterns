# Decorator Pattern
*  The Decorator Pattern attaches additional responsibilities to an object dynamically. Decorators provide a flexible alternative to subclassing for extending functionality.

## Interview Questions

#### 1. What is the main intent(s) of the decorator pattern, and how does it accomplish it?
- **Intent:** The Decorator Pattern attaches additional responsibilities to an object dynamically. Decorators provide a flexible alternative to subclassing for extending functionality.
- **Accomplishment:** It achieves this by defining a set of decorator classes that wrap the original object and implement the same interface. This allows decorators to add or modify behaviors transparently without altering the original object.

#### 2. Are decorators static or dynamic (meaning can they add runtime/dynamic behavior)? How?
- **Dynamic:** Decorators are dynamic because they can be applied at runtime.
- **How:** By wrapping the original object with a decorator class that implements the same interface, you can change or add new behavior without modifying the original class. This means new decorators can be applied or changed dynamically during program execution.

#### 3. Why do decorators have the same super-types as the objects they are decorating?
- **Reason:** Decorators need to have the same super-type to ensure they are interchangeable with the objects they decorate. This allows decorators to be used in place of the original objects, providing seamless behavior modification while maintaining compatibility.

#### 4. In the decorator pattern, we use inheritance and composition. Explain the role of each one.
- **Inheritance:** The decorator inherits the same interface or abstract class as the component it decorates, ensuring type compatibility.
- **Composition:** The decorator uses composition by holding a reference to a component object, allowing it to wrap the original object and add new behavior.

#### 5. What is the downside of the decorator pattern?
- **Downside:**
    - **Complexity:** Using multiple decorators can increase complexity and make it harder to understand the overall behavior.
    - **Overhead:** Wrapping objects multiple times can add performance overhead, especially if numerous decorators are chained.
    - **Debugging Difficulty:** Tracing the flow of control through several layers of decorators can be challenging.

#### 6. Sample Code for Decorator Pattern in PHP
```php
<?php

// Base interface for a component
interface Coffee
{
    public function getCost(): float;
    public function getDescription(): string;
}

// Concrete component
class SimpleCoffee implements Coffee
{
    public function getCost(): float
    {
        return 5.0;
    }

    public function getDescription(): string
    {
        return "Simple Coffee";
    }
}

// Base decorator
abstract class CoffeeDecorator implements Coffee
{
    protected Coffee $coffee;

    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }

    public function getCost(): float
    {
        return $this->coffee->getCost();
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription();
    }
}

// Concrete decorators
class MilkDecorator extends CoffeeDecorator
{
    public function getCost(): float
    {
        return $this->coffee->getCost() + 1.5;
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ", Milk";
    }
}

class SugarDecorator extends CoffeeDecorator
{
    public function getCost(): float
    {
        return $this->coffee->getCost() + 0.5;
    }

    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ", Sugar";
    }
}

// Usage
$simpleCoffee = new SimpleCoffee();
echo $simpleCoffee->getDescription() . " costs $" . $simpleCoffee->getCost() . "\n";

// Adding milk
$milkCoffee = new MilkDecorator($simpleCoffee);
echo $milkCoffee->getDescription() . " costs $" . $milkCoffee->getCost() . "\n";

// Adding milk and sugar
$sugarMilkCoffee = new SugarDecorator($milkCoffee);
echo $sugarMilkCoffee->getDescription() . " costs $" . $sugarMilkCoffee->getCost() . "\n";

// Adding double sugar
$doubleSugarMilkCoffee = new SugarDecorator($sugarMilkCoffee);
echo $doubleSugarMilkCoffee->getDescription() . " costs $" . $doubleSugarMilkCoffee->getCost() . "\n";

?>
```

## Practical Applications
Here are some practical applications of the Decorator pattern in PHP and Laravel:

### 1. **Input Validation and Filtering**
- **Scenario:** You want to apply multiple validation and filtering rules to user input.
- **Implementation:** Each rule (like trimming whitespace, removing HTML tags, checking for non-empty input, etc.) can be implemented as a decorator that wraps the original input. This allows dynamic application of rules.

### 2. **Response Transformation**
- **Scenario:** You need to transform responses before sending them back to the client.
- **Implementation:** Decorators can be used to wrap responses and apply transformations like JSON encoding, XML conversion, or formatting.

### 3. **Logger Enhancements**
- **Scenario:** Adding extra behavior to loggers, such as timestamping, sanitization, or different log formats.
- **Implementation:** Decorators can wrap a logger object, adding the desired behavior to each log message before it gets logged.

### 4. **Cache Wrapping**
- **Scenario:** Caching expensive computations or database queries.
- **Implementation:** A cache decorator wraps around the object or method performing the computation. It stores the results, returning cached values if available and calling the wrapped computation otherwise.

### 5. **Middleware Enhancement in Laravel**
- **Scenario:** Adding additional behavior to HTTP requests and responses, like logging, session management, or modifying headers.
- **Implementation:** Middleware acts as a chain of decorators, wrapping around the HTTP requests and responses.

### 6. **Rate Limiting**
- **Scenario:** Controlling the rate of API calls made to third-party services.
- **Implementation:** A decorator can wrap around the API call logic, checking if the rate limit is exceeded and preventing further calls if so.

### 7. **Security Wrappers**
- **Scenario:** Adding security checks to database queries or sensitive operations.
- **Implementation:** Decorators can wrap queries or sensitive methods to add logging, authorization checks, or input sanitization.
