// Target Interface: What the client expects
interface Printer {
    void print(String message);
}

// Adaptee: Existing incompatible class
class LegacyPrinter {
    public void printLegacy(String message) {
        System.out.println("Legacy Printer: " + message.toUpperCase());
    }
}

// Adapter: Uses inheritance (extends LegacyPrinter) and implements Target
class ClassPrinterAdapter extends LegacyPrinter implements Printer {
    @Override
    public void print(String message) {
        // Adapt the call to the Adaptee's method
        printLegacy(message);  // Calls the inherited method
    }
}

// Client Code
public class ClassAdapterDemo {
    public static void main(String[] args) {
        Printer printer = new ClassPrinterAdapter();
        printer.print("Hello, Adapter Pattern!");
        // Output: Legacy Printer: HELLO, ADAPTER PATTERN!
    }
}
