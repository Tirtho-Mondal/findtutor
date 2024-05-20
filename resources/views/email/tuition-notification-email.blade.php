<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Notification Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #444;
        }
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello {{ $mailData['employer']->name }},</h1>
        
        <p><strong>Tuition Title:</strong> {{ $mailData['job']->title }}</p>

        <h2>Student Details:</h2>
        
        <p><strong>Name:</strong> {{ $mailData['user']->name }}</p>
        <p><strong>Email:</strong> {{ $mailData['user']->email }}</p>
        <p><strong>Mobile No:</strong> {{ $mailData['user']->mobile }}</p>
    </div>
</body>
</html>
