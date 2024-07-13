<!DOCTYPE html>
<html>
<head>
    <title>Contact Attempt</title>
</head>
<body>
    <p>Dear {{ $clientName }},</p>

    <p>We hope this email finds you well.</p>

    <p>
        We attempted to contact you regarding your application with {{ config('app.name') }}, but unfortunately, we were unable to reach you.
    </p>

    <p>
        Please let us know a convenient time to contact you or reach out to us at your earliest convenience.
    </p>

    <p>If you have any questions, please feel free to contact us at {{ $companyEmail }} or {{ $companyPhone }}.</p>

    <p>Best regards,</p>

    <p>
        {{ config('app.name') }}
    </p>
</body>
</html>
