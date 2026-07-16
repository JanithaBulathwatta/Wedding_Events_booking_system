<!DOCTYPE html>
<html>
<head>
    <title>New Booking Request</title>
</head>
<body style="font-family: sans-serif; color: #333;">
    <h2 style="color: #f59e0b;">Hello {{ $bookingDetails['provider_name'] }},</h2>
    <p>You have received a new booking request. The details are below:</p>

    <div style="background: #f8fafc; padding: 15px; border-radius: 8px; border: 1px solid #e2e8f0;">
        <p><strong>Customer Name:</strong> {{ $bookingDetails['customer_name'] }}</p>
        <p><strong>Booking Date:</strong> {{ $bookingDetails['booking_date'] }}</p>
        <p><strong>Price:</strong> Rs. {{ $bookingDetails['total_price'] }}.00</p>
        <p><strong>Selected Services:</strong></p>
        <ul>
            @if(is_array($bookingDetails['services']) || is_object($bookingDetails['services']))
                @foreach($bookingDetails['services'] as $service)
                    @php
                        $serviceData = is_string($service) ? json_decode($service, true) : (array)$service;
                    @endphp

                    <li>{{ $serviceData['serviceName'] ?? ($serviceData['name'] ?? 'Unknown Service') }}</li>
                @endforeach
            @else
                <li>No services selected</li>
            @endif
        </ul>
    </div>

    <p>Please check your dashboard and accept or decline this order.</p>
    <p>Best Regards,<br>Team Ashtaka</p>
</body>
</html>
