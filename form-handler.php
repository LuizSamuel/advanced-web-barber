<?php
//error checker
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load Composer's autoloader
require 'vendormsg/autoload.php';

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

//start the session to store messages
  session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Set up the mailer transport for your custom domain
    $transport = Transport::fromDsn('smtp://info@favornjebrands.co.ke:DIWyEQ^A3.e;@mail.favornjebrands.co.ke:587?encryption=tls&auth_mode=login');

    // Create the Mailer using your created Transport
    $mailer = new Mailer($transport);

    // Create the email message
    $emailMessage = (new Email())
        ->from($email) // Use the user's email as the sender
        ->to('info@favornjebrands.co.ke') // Your email address where you want to receive messages
        ->subject($subject)
        ->text("Name: $name\nEmail: $email\n\nMessage:\n$message");

    // Send the email
    try {
        $mailer->send($emailMessage);
        
        // Create and send an automated response email
        $autoResponse = (new Email())
            ->from('FavorBrands Team <info@favornjebrands.co.ke>') // Your email address
            
            ->to($email) // Send it back to the user
            ->subject('Thank you for contacting us!')
            ->html("
                <html>
                <body style='font-family: Arial, sans-serif; color: #333;'>
                   <div style='text-align: center; margin-bottom: 20px;'>
                <img src='https://info@favornjebrands.co.ke/logo/logo.png' alt='FavorBrand' style='max-width: 150px; height: auto;'>
            </div>
                    <h2 style='color: #007BFF;'>Dear $name,</h2>
                    <p>Thank you for contacting Favor Brands customer care service. Please note we will respond to you Enquiry very soon.</p>
                    <p>Best regards,<br>Favor Brands Customer Care</p>
                    <p style='font-size: 0.9em; color: #777;'>Please do not reply to this email.</p>
                </body>
                </html>
            ");
            
            
            // Set the Reply-To header
            $autoResponse->getHeaders()->addHeader('Reply-To', 'no-reply@favornjebrands.co.ke');

        // Send the automated response
        $mailer->send($autoResponse);

        
    //     $mailer->send($emailMessage);
    //     echo "Message sent successfully!";
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Error: {$e->getMessage()}";
    // }
//}
  // Store success message
        $_SESSION['message'] = "Message sent successfully!";
    } catch (Exception $e) {
        // Store error message
        $_SESSION['message'] = "Message could not be sent. Error: {$e->getMessage()}";
    }

    // Redirect to contactus.php
    header("Location: contactus.php");
    exit();
}

