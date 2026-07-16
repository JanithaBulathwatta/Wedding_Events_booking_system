<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmed</title>
</head>
<body style="font-family: sans-serif; color: #333;">
    <h2 style="color: #10b981;">Good News, {{ $bookingData['customer_name'] }}!</h2>
    <p>The booking you made has been confirmed (Accepted) by the relevant service provider.</p>

    <div style="background: #f0fdf4; padding: 15px; border-radius: 8px; border: 1px solid #bbf7d0;">
        <p><strong>Provider Name:</strong> {{ $bookingData['provider_name'] }}</p>
        <p><strong>Booking Date:</strong> {{ $bookingData['booking_date'] }}</p>

        <p><strong>Selected Services:</strong></p>
        <ul>
            @if(!empty($bookingData['services']) && is_array($bookingData['services']))
                @foreach($bookingData['services'] as $service)
                    @php
                        $serviceDetails = is_string($service) ? json_decode($service, true) : (array)$service;
                    @endphp
                    <li>{{ $serviceDetails['serviceName'] ?? 'Unknown Service' }}</li>
                @endforeach
            @else
                <li>No services selected</li>
            @endif
        </ul>
    </div>

    <p>Thank you for trusting us!</p>
    <p>Best Regards,<br>Team Ashtaka</p>
</body>
</html>
