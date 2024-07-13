<!DOCTYPE html>
<html>
<head>
    <title>Application Approved</title>
</head>
<body>
    <p>Dear {{ $clientName }},</p>

    <p>Congratulations!</p>

    <p>
        We are pleased to inform you that your application for <strong>{{ $appName }}</strong> has been approved by {{ config('app.name') }}.
    </p>

    <p>
        Thank you for choosing us and we look forward to working with you. If you have any questions or need further assistance, please do not hesitate to contact us at {{ $companyEmail }} or {{ $companyPhone }}.
    </p>

    <p>Best regards,</p>

    <p>
        {{ config('app.name') }}
    </p>
</body>
</html>
