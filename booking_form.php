<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now - Payment</title>
    <style>
        /* General body styling for a black background */
        body {
            background-color: black; /* Black background */
            color: #fff; /* White text color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Center the container and give it a white background */
        .container {
            background-color: black; /* White background */
            color: gold; /* Black text inside the container */
            width: 50%; /* Adjust the size as necessary */
            height: 400px;
            margin: 5% auto; /* Center horizontally and add top margin */
            padding: 20px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for effect */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center elements vertically */
            align-items: center; /* Center elements horizontally */
        }

        /* Styling for the form fields */
        input[type="email"], button {
            width: 70%; /* Full width inputs */
            padding: 10px;
            margin: 10px 0;
            align-items: center;
            border: 1px solid #ccc; /* Light border for input fields */
            border-radius: 5px; /* Slightly rounded corners */
            font-size: 16px;
        }

        /* Styling for the button */
        button {
            background-color: gold; /* Black background for the button */
            color: #fff; /* White text color */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hover effect for the button */
        button:hover {
            background-color: #333; /* Lighter black on hover */
        }

        /* Centering the title */
        h2 {
            text-align: center;
        }

        /* Media query for small devices (mobiles, small tablets) */
        @media (max-width: 768px) {
            .container {
                width: 80%; /* Wider for smaller screens */
                padding: 20px; /* Reduce padding */
                display: flex;
                display: flex;
                flex-direction: column;
                justify-content: center; /* Center elements vertically */
                align-items: center; /* Center elements horizontally */
            }

            /* Adjust the font size for smaller screens */
            input[type="email"], button {
                font-size: 14px;
            }
        }

        /* Media query for extra-small devices (phones) */
        @media (max-width: 480px) {
            .container {
                width: 95%; /* Almost full width */
                padding: 15px; /* Less padding for small screens */
                display: flex;
                flex-direction: column;
                justify-content: center; /* Center elements vertically */
                align-items: center; /* Center elements horizontally */
            }

            h2 {
                font-size: 20px; /* Smaller title font */
            }

            input[type="email"], button {
                font-size: 12px; /* Adjust font size for small screens */
            }
        }
    </style>
</head>
<body>
    <!-- Container with white background -->
    <div class="container">
        <h2>Complete Your Booking</h2>
        
        <!-- Booking form -->
        <form action="process_payment.php" method="POST">
            <!-- Amount is hidden, you can change this based on what you're selling -->
            <input type="hidden" name="amount" value="22000" />
            <input type="hidden" name="description" value="Old Oyo National Park Booking" />
            
            <label for="email">Your Email:</label><br>
            <input type="email" name="email" id="email" required /><br><br>
            
            <button type="submit">Proceed to Pay</button>
        </form>
    </div>
</body>
</html>
