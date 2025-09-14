<h3>Device Submission Confirmation</h3>
<p>Hi {{ $device->user->name }},</p>
<p>Your device "{{ $device->device_name }}" has been successfully submitted for recycling.</p>
<p>Tracking Code: <strong>{{ $device->tracking_code }}</strong></p>
<p>Status: {{ $device->status }}</p>
<p>Thank you for contributing to e-waste recycling!</p>
<p>Best regards,<br>The E-Waste Recycling Team</p>