<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px 10px;
        }
        .content {
            padding: 20px;
            color: #333;
        }
        .content h2 {
            color: #4CAF50;
            margin-top: 0;
        }
        .score-box {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
        }
        .button:hover {
            background-color: #45a049;
        }
        .footer {
            background-color: #f1f1f1;
            color: #777;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Your Quiz Results Are In!</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Dear {{ $name }},</p>
            <p>Congratulations on completing the quiz for <strong>{{ $course_name }}</strong>!</p>

            <div class="score-box">
                <h2>Your Score: {{ $score }}/{{ $total }}</h2>
                <p>
                    {{ $passed ? "Well done! You've passed the quiz." : "Unfortunately, you didn't pass this time. Keep practicing!" }}
                </p>
            </div>

            <p>
                {{ $passed ? "We’re proud of your achievement and encourage you to keep learning." : "Don't worry, you can always retake the quiz to improve your score." }}
            </p>

            <p style="text-align: center;">
                <a href="#" class="button">Review Quiz</a>
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>
                If you have any questions, feel free to contact us at <a href="mailto:support@example.com">support@example.com</a>.
            </p>
            <p>&copy; {{ date('Y') }} Your Learning Platform. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
