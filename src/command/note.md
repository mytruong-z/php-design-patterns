# Command Pattern
Encapsulates a request as an object, thereby letting you parametrize clients with different requests, queue or log requests, and support undoable operations.

### OOP Principles
The Command pattern encapsulates a request as an object, thereby allowing for parameterization of clients with different requests, queuing of requests, and logging the requests. It also provides a mechanism to support undoable operations. Key principles associated with the Command pattern include:

#### 1. **Encapsulation**
- **Encapsulate Commands**: Each command (or request) is encapsulated in its own class. The command class encapsulates the method to execute, the parameters to pass, and sometimes the receiver (the object performing the action).

- **Benefits**: This encapsulation enables easier queuing, logging, and handling of commands, as well as implementing undo functionality.

#### 2. **Polymorphism**
- **Command Interface**: The Command pattern leverages polymorphism to allow different command classes to share the same interface. Commands are typically defined using an abstract class or an interface, often with a method like `execute()`.

- **Benefits**: This allows different command implementations to be treated uniformly by the invoker, enabling it to execute any command without knowing its specific implementation.

#### 3. **Decoupling**
- **Decouples Invoker and Receiver**: The pattern decouples the object invoking the command (Invoker) from the object performing the command (Receiver). The invoker only knows about the command interface and doesn't know about the implementation details of the specific commands.

- **Benefits**: This decoupling increases flexibility, as the invoker can work with any command that implements the command interface.

#### 4. **Single Responsibility Principle**
- **Command Classes Have One Responsibility**: Each concrete command class encapsulates one specific action to be performed. This aligns with the Single Responsibility Principle (SRP), which states that a class should have only one reason to change.

- **Benefits**: Adhering to SRP makes each command class simple, easy to understand, and easier to modify without affecting other commands.

#### 5. **Open/Closed Principle**
- **Extensibility of Commands**: The Command pattern adheres to the Open/Closed Principle (OCP), which states that software entities should be open for extension but closed for modification. New command classes can be added without changing existing code by implementing the command interface.

- **Benefits**: This supports a system that can grow over time without requiring changes to existing, tested components.

## Practice Applications

The Command pattern is highly versatile and finds practical applications in various domains of software development. Here are some typical scenarios where the Command pattern can be effectively used:

#### 1. **GUI Button and Menu Actions**
- **Description**: In graphical user interfaces (GUIs), buttons and menu items often trigger different actions. The Command pattern can encapsulate these actions, making the GUI components reusable and extensible.
- **Example**: A text editor might use the Command pattern to handle actions like copying, pasting, and undoing. Each action can be encapsulated as a command object, which is then linked to buttons or menu items.

#### 2. **Undo/Redo Mechanisms**
- **Description**: The Command pattern is perfect for implementing undo and redo functionalities in applications such as text editors, graphic design tools, or any system that modifies data and needs to provide rollback capabilities.
- **Example**: Each action performed is stored as a command object in a history stack. To undo an action, the command is popped from the undo stack and its `undo()` method is invoked.

#### 3. **Task Scheduling and Background Processing**
- **Description**: The Command pattern can be used to queue operations, schedule them for later execution, or dispatch them to background threads.
- **Example**: A job queue processor that handles tasks such as generating reports or batch data processing can use command objects to represent requests, which are then processed by worker threads.

#### 4. **Transaction Scripts**
- **Description**: For operations that require transactional behavior, where a series of actions must be completed successfully or not at all, the Command pattern can encapsulate these actions.
- **Example**: In a banking application, transferring funds might involve several steps (debiting one account, crediting another) that can be encapsulated in a command object with rollback capabilities.

#### 5. **Macro Recording**
- **Description**: Applications that support macro recording (such as office suites or graphic design tools) can use the Command pattern to record a sequence of actions to be played back later.
- **Example**: Each user action is recorded as a command object. The macro feature then saves a list of these commands, which can be replayed to reproduce the recorded actions.

#### 6. **Remote Command Execution**
- **Description**: The Command pattern can be applied to systems where commands need to be serialized and sent over a network, to be executed on a remote server or device.
- **Example**: In a home automation system, commands to turn on the light, adjust the thermostat, or lock the door can be sent from a smartphone app to the home system.

#### 7. **Integration with Third-Party Services**
- **Description**: When integrating with APIs or third-party services, the Command pattern can encapsulate requests as command objects, which can be dynamically constructed and executed.
- **Example**: An e-commerce application might use command objects to handle API calls for payment processing, where each type of payment (credit card, PayPal, etc.) is a different command.

#### 8. **Adapting to Different User Preferences or Configurations**
- **Description**: Systems that need to adapt to different user settings or configurations can use command objects to encapsulate these variations.
- **Example**: A customizable toolbar where each button's action can be configured by the user to execute a different command based on their preferences.