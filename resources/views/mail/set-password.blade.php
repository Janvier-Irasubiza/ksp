<!DOCTYPE html>
<html>
<head>
    <title>Set Your Password</title>
</head>
<body>
    <p>Dear {{ $agentName }},</p>

    <p>Welcome to {{ config('app.name') }}!</p>

    <p>
        An account has been created for you, and you are just one step away from accessing the system. To ensure the security of your account, we need you to set your password. Please follow the steps below to complete your account setup:
    </p>

    <p>
        <strong>1. Click the link below to set your password:</strong><br>
        <a href="{{ $passwordResetLink }}">Set Your Password</a>
    </p>

    <p>
        <strong>2. Enter a strong and unique password in the provided fields.</strong>
    </p>

    <p>
        <strong>3. Confirm your password and click "Submit."</strong>
    </p>

    <p>Once you have set your password, you will be able to log in and start using the system.</p>

    <p>If you have any questions or need assistance, please don't hesitate to contact our support team at {{ $supportEmail }} or {{ $supportPhone }}.</p>

    <p>Here is your promo code: <strong>{{ $promo_code }}</strong></p>

    <p>Thank you for your cooperation.</p> <br>

    <p>
        Best regards,<br>
        {{ config('app.name') }}
    </p>
</body>
</html>

