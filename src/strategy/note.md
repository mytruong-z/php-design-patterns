# Strategy Pattern
* Strategy pattern is a behavioral design pattern that enables selecting an algorithm at runtime.
* Defines a family of algorithms, encapsulates each one, and makes them interchangeable. Strategy lets the algorithm vary independently from clients that use it.

### Interview Questions

1. **Basic Understanding of Strategy Pattern**:
    - What is the Strategy pattern, and how is it implemented in PHP?
   > The Strategy pattern is a behavioral design pattern that enables selecting an algorithm's implementation at runtime. It defines a family of algorithms, encapsulates each one, and makes them interchangeable. In PHP, it's implemented using interfaces for the strategy definition and concrete classes for each specific implementation. The client uses a context class that dynamically assigns the strategy and delegates the execution to the selected strategy.
    - What is the main benefit of using the Strategy pattern over conditional statements?
   > The Strategy pattern provides better flexibility and scalability than using conditional statements, which become difficult to maintain as the number of algorithms increases. It promotes clean code by separating concerns, adhering to the Open/Closed Principle (open for extension, closed for modification). Algorithms are encapsulated into separate classes, allowing new strategies to be added without changing existing code.

2. **Implementation Specifics**:
    - How would you design a Strategy pattern to support multiple sorting algorithms for an application?
   > To design a Strategy pattern for multiple sorting algorithms:
   > 1. Define a SortStrategy interface that declares a sort method.
   > 2. Implement concrete classes like QuickSort, MergeSort, etc., each implementing the SortStrategy interface.
   > 3. Create a SortingContext class that holds a reference to a SortStrategy object and provides a sort method that delegates to the current strategy.
   > 4. Allow the strategy to be set dynamically, either through the constructor or via a setter method.
    - Can you show a simple example of the Strategy pattern in PHP?
```php
interface SortStrategy {
    public function sort(array $data): array;
}

class QuickSort implements SortStrategy {
    public function sort(array $data): array {
        sort($data);
        return $data;
    }
}

class BubbleSort implements SortStrategy {
    public function sort(array $data): array {
        for ($i = 0; $i < count($data) - 1; $i++) {
            for ($j = 0; $j < count($data) - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    [$data[$j], $data[$j + 1]] = [$data[$j + 1], $data[$j]];
                }
            }
        }
        return $data;
    }
}

class SortingContext {
    private SortStrategy $sortStrategy;

    public function __construct(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function setSortStrategy(SortStrategy $sortStrategy): void {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort(array $data): array {
        return $this->sortStrategy->sort($data);
    }
}

// Example Usage:
$sortingContext = new SortingContext(new QuickSort());
print_r($sortingContext->sort([4, 2, 8, 5, 7]));

$sortingContext->setSortStrategy(new BubbleSort());
print_r($sortingContext->sort([4, 2, 8, 5, 7]));

```

3. **Laravel Integration**:
    - How would you integrate the Strategy pattern into a Laravel application?
   > In a Laravel application, the Strategy pattern can be integrated using service providers and dependency injection. You can register strategy implementations in a service provider and then inject the desired strategy into the client class.
   > 1. Create Strategy Interface: Define an interface for the strategy.
   > 2. Implement Strategies: Create concrete implementations for each strategy.
   > 3. Service Provider: Register the strategies in a service provider using the service container.
   > 4. Inject Strategy: Inject the appropriate strategy into the client class using constructor injection. 
    - Can you explain how to use the Laravel service container to resolve different strategies?
   > Laravel's service container (IoC container) allows you to bind interfaces to concrete classes dynamically. To resolve different strategies, you would:
   > 1. Bind Strategies: Bind each strategy implementation to its interface in a service provider or a controller.
   > 2. Context Configuration: Use Laravel’s App::make() to dynamically resolve strategies based on the configuration or other parameters.
   > 3. Dependency Injection: Use Laravel’s dependency injection feature to inject the strategy directly into the client class's constructor, which simplifies strategy selection.


4. **Design and Usage**:
    - What are some common pitfalls when implementing the Strategy pattern?
    > 1. **Too Many Strategies**: Excessive strategies can make the application hard to understand and maintain.
    > 2. **Complex Contexts**: Overcomplicating the context class with logic that doesn't pertain to selecting or using the strategy.
    > 3. **Strategy Duplication**: Implementing duplicate strategies due to a lack of abstraction or misunderstanding of the pattern.
    > 4. **Inflexible Strategy Selection**: Hardcoding strategy selection rather than providing dynamic ways to choose strategies. 
    - How would you refactor a monolithic application to use the Strategy pattern for handling payment methods?
    > 1. Extract Interfaces: Define an interface for the common payment operations (e.g., processPayment).
    > 2. Implement Strategies: Create separate classes for each payment method implementing the new interface.
    > 3. Introduce Context Class: Create a context class that uses the payment interface and allows the strategy to be set dynamically.
    > 4. Refactor Existing Code: Replace hardcoded payment logic with the context class to make use of the dynamic strategies. 

5. **Testing and Maintenance**:
    - How would you write unit tests for a class that uses the Strategy pattern?
    > 1. Mock the Strategy: Use PHPUnit to mock the strategy interface, allowing you to verify that the context class calls the expected methods.
    > 2. Test Strategy Switching: Check if the context correctly switches strategies and if the expected method is called.
    > 3. Behavior Testing: Test the class’s behavior by injecting different strategies and asserting the expected outcomes.
    - How can you ensure that adding new strategies to a class doesn't break existing functionality?
    > 1. Interface Contracts: Ensure all strategies conform to a common interface and fulfill the same contract.
    > 2. Extensive Unit Testing: Write comprehensive unit tests for the context and all strategies to catch regressions early.
    > 3. Adhere to SOLID Principles: Keep strategies isolated from the context's business logic, and follow the Open/Closed Principle to add new strategies safely. 

### Practical Applications

1. **Payment Processing**:
    - **Scenario**: You have an e-commerce platform that needs to handle multiple payment gateways like PayPal, Stripe, and bank transfers.
    - **Implementation**: Implement each payment gateway as a concrete strategy that follows a `PaymentGateway` interface. The application dynamically selects the appropriate payment strategy based on user input.

2. **Sorting Algorithms**:
    - **Scenario**: A data processing tool needs to support different sorting algorithms like quicksort, mergesort, and bubblesort.
    - **Implementation**: Create a `SortStrategy` interface that different sorting algorithms implement. The application can switch between sorting strategies at runtime based on data size and sorting speed requirements.

3. **Logging Mechanisms**:
    - **Scenario**: A system needs to log messages to various backends like files, databases, or cloud logging services.
    - **Implementation**: Define a `LoggerStrategy` interface that different logging strategies implement. The main logger dynamically selects the appropriate strategy based on configuration settings.

4. **Compression**:
    - **Scenario**: A file management system needs to compress files using different algorithms like ZIP, GZIP, or BZIP2.
    - **Implementation**: Implement a `CompressionStrategy` interface with different concrete strategies for each compression algorithm. The file management system selects a compression strategy based on user preferences or file size.

5. **Validation Rules**:
    - **Scenario**: A data validation service needs to apply different validation rules based on the type of data being validated (e.g., emails, URLs, or phone numbers).
    - **Implementation**: Create a `ValidationStrategy` interface that each concrete validation rule implements. The service can then switch validation strategies dynamically based on the type of data being processed.

These examples demonstrate how the Strategy pattern can help create flexible, maintainable applications in PHP and Laravel by allowing algorithms to be swapped easily at runtime.