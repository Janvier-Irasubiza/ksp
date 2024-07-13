<!DOCTYPE html>
<html>
<head>
    <title>Application Denied</title>
</head>
<body>
    <p>Dear {{ $clientName }},</p>

    <p>We hope this email finds you well.</p>

    <p>
        We regret to inform you that your application for <strong>{{ $appName }}</strong> with  {{ config('app.name') }} has been denied.
    </p>

    <p>
        Reason for denial: {{ $denialReason }}
    </p>

    <p>If you have any questions or need further clarification, please feel free to contact us at {{ $companyEmail }} or {{ $companyPhone }}.</p>

    <p>Thank you for your understanding.</p>

    <p>Best regards,</p>

    <p>
        {{ config('app.name') }}
    </p>
</body>
</html>
