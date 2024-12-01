<x-app-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .email-container {
            background-color: white;
            width: 400px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #008000; /* Green color */
            color: white;
            padding: 16px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        .header img {
            width: 30px;
            vertical-align: middle;
            margin-right: 8px;
        }

        .content {
            padding: 20px;
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        .login-code {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #f3f3f3;
            color: #008000; /* Green color for text */
            font-size: 20px;
            font-weight: bold;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #999;
            padding: 16px;
            background-color: #f9f9f9;
            border-top: 1px solid #eee;
        }

        .footer a {
            color: #008000;
            text-decoration: none;
        }
    </style>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <img src="" alt="Logo">
            City Health Card System
        </div>

        <!-- Content -->
        <div class="content">
            <p>Your login code is:</p>
            <div class="login-code">mmCKul</div>
            <p>If you didn't request this code, please ignore this email.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2024 City Health Card System. All rights reserved.
        </div>
    </div>
</x-app-layout>
