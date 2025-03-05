<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Property Reservation Receipt</title>
</head>
<body style="background-color: #f3f4f6; margin: 0; padding: 20px; font-family: Arial, sans-serif;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-collapse: padding:20px collapse;">
        <!-- Header -->
        <tr>
            <td width="50%" style="padding-bottom: 15px;">
                <h1 style="font-size: 24px; font-weight: bold; color: #1f2937; margin: 0;">Reservation Receipt</h1>
                <p style="font-size: 14px; color: #4b5563; margin: 5px 0 0 0;">Touristay v2</p>
            </td>
            <td width="50%" style="text-align: right; padding-bottom: 15px;">
                <p style="font-size: 14px; color: #4b5563; margin: 0;">Issued on: {{ \Carbon\Carbon::now()->format('F j, Y') }}</p>
                <p style="font-size: 14px; font-weight: bold; color: #1f2937; margin: 5px 0 0 0;">Reservation ID: #{{ $details["reservation_id"] }}</p>
            </td>
        </tr>

        <!-- Reservation Details -->
        <tr>
            <td colspan="2" style="padding-bottom: 15px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="50%" style="padding-right: 15px;">
                            <h2 style="font-size: 18px; font-weight: bold; color: #374151; margin: 0 0 5px 0;">Property Details</h2>
                            <p style="font-size: 14px; color: #4b5563; margin: 0;"><span style="font-weight: bold;">Property Name:</span> {{ $details["property_title"] }}</p>
                        </td>
                        <td width="50%">
                            <h2 style="font-size: 18px; font-weight: bold; color: #374151; margin: 0 0 5px 0;">Guest Details</h2>
                            <p style="font-size: 14px; color: #4b5563; margin: 0;"><span style="font-weight: bold;">Guest Name:</span> {{ $details["name"] }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="padding-right: 15px; padding-top: 10px;">
                            <p style="font-size: 14px; color: #4b5563; margin: 0;"><span style="font-weight: bold;">Check-in Date:</span> {{ $details["start_date"] }}</p>
                            <p style="font-size: 14px; color: #4b5563; margin: 5px 0 0 0;"><span style="font-weight: bold;">Check-out Date:</span> {{ $details["end_date"] }}</p>
                        </td>
                        <td width="50%" style="padding-top: 10px;">
                            <p style="font-size: 14px; color: #4b5563; margin: 0;"><span style="font-weight: bold;">Total Price:</span> {{ $details["end_date"] }}</p>
                            <p style="font-size: 14px; color: #4b5563; margin: 5px 0 0 0;"><span style="font-weight: bold;">Payment Status:</span> 
                                <span style="display: inline-block; padding: 5px 10px; font-size: 12px; font-weight: bold; color: #065f46; background-color: #d1fae5; border-radius: 4px;">Paid</span>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Terms & Conditions -->
        <tr>
            <td colspan="2" style="padding-bottom: 15px; border-top: 1px solid #e5e7eb;">
                <h2 style="font-size: 18px; font-weight: bold; color: #374151; margin: 10px 0 5px 0;">Terms & Conditions</h2>
                <ul style="font-size: 14px; color: #4b5563; margin: 0; padding-left: 20px; list-style-type: disc;">
                    <li style="margin-bottom: 5px;">Full payment is required at the time of booking.</li>
                    <li style="margin-bottom: 5px;">Cancellations made within 48 hours of check-in are non-refundable.</li>
                    <li>Guests are responsible for any property damage incurred during their stay.</li>
                </ul>
            </td>
        </tr>

        <!-- Thank You Note -->
        <tr>
            <td colspan="2" style="text-align: center; padding-top: 15px; border-top: 1px solid #e5e7eb;">
                <p style="font-size: 16px; font-weight: bold; color: #374151; margin: 0 0 5px 0;">Thank You for Choosing Us!</p>
                <p style="font-size: 14px; color: #4b5563; margin: 0;">We look forward to welcoming you to Sunset Villa. If you have any questions, feel free to contact us at support@xai.com.</p>
            </td>
        </tr>
    </table>
</body>
</html>