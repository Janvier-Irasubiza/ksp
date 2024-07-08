<!DOCTYPE html>
<html>
<head>
    <title>Application Received</title>
</head>
<body>
    <p>Dear {{ $clientName }},</p>

    <p>Thank you for your application to {{ config('app.name') }} for <strong>{{ $appName }}</strong>!</p>

    <p>
        We are pleased to inform you that we have received your application. Our team is currently reviewing your submission and will contact you soon with further details.
    </p>

    <p>If you have any questions in the meantime, please feel free to reach out to our support team at {{ $companyEmail }} or {{ $companyPhone }}.</p>

    <p>Thank you for choosing {{ config('app.name') }}.</p>

    <p>
        Best regards,<br>
        {{ config('app.name') }}
    </p>
</body>
</html>
