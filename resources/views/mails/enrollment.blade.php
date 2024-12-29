<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            background-color: white;
            border-radius: 0 0 8px 8px;
        }
        .content h2 {
            color: #333;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            margin-top: 20px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to the Course</h1>
        </div>

        <div class="content">
            <h2>Hello {{ $name }},</h2>
            <p>We are excited to inform you that you have successfully enrolled in the course <strong>{{ $title }}</strong>!</p>

            <p>We hope you're looking forward to learning new skills and gaining valuable knowledge.</p>

            <p>If you have any questions or need further assistance, feel free to reach out to us.</p>

            <p>Click the button below to access your course:</p>

            <a href="{{ $url }}" class="button">Go to Course</a>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Learning Management System. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
