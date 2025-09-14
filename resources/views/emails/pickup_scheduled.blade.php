<h3>Pickup Scheduled</h3>
<p>Hi {{ $pickup->device->user->name }},</p>
<p>Your device "{{ $pickup->device->device_name }}" has a pickup scheduled.</p>
<p>Date: {{ $pickup->pickup_date }}</p>
<p>Collector: {{ $pickup->collector->name }}</p>
<p>Status: {{ $pickup->status }}</p>
<p>Thank you for contributing to e-waste recycling!</p>