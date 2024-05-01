<?php
namespace App\strategy\PracticalApplications;

/*
 * To implement multiple payment gateways in a scalable way, you can create a PaymentGateway interface that each payment strategy implements.
 * Then, depending on user input or configuration, the appropriate gateway can be used.
 */

// PaymentGateway Interface
interface PaymentGateway
{
    public function pay(float $amount): void;
}

// PayPal Payment Strategy
class PayPalPayment implements PaymentGateway
{
    public function pay(float $amount): void
    {
        echo "Processing \${$amount} payment through PayPal.\n";
    }
}

// Stripe Payment Strategy
class StripePayment implements PaymentGateway
{
    public function pay(float $amount): void
    {
        echo "Processing \${$amount} payment through Stripe.\n";
    }
}

// Payment Processor Context
class PaymentProcessor
{
    private PaymentGateway $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function setPaymentGateway(PaymentGateway $paymentGateway): void
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function processPayment(float $amount): void
    {
        $this->paymentGateway->pay($amount);
    }
}

// Usage Example
$paymentProcessor = new PaymentProcessor(new PayPalPayment());
$paymentProcessor->processPayment(50.0); // PayPal

$paymentProcessor->setPaymentGateway(new StripePayment());
$paymentProcessor->processPayment(75.0); // Stripe

