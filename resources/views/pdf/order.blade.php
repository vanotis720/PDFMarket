<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order #{{ $order->id }} - Receipt</title>
    <style>
        /* Modern UI styling */
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eaeaea;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #3b82f6;
        }

        .order-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .order-details,
        .user-details {
            flex: 1;
        }

        .order-id {
            font-size: 1.2rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
        }

        .status {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: uppercase;
        }

        .status-paid {
            background-color: #10b981;
            color: white;
        }

        .status-pending {
            background-color: #f59e0b;
            color: white;
        }

        .status-failed {
            background-color: #ef4444;
            color: white;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        .table th {
            text-align: left;
            padding: 0.75rem;
            background-color: #f1f5f9;
            border-bottom: 1px solid #e5e7eb;
        }

        .table td {
            padding: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .amount {
            font-weight: bold;
        }

        .total-row td {
            border-top: 2px solid #e5e7eb;
            font-weight: bold;
        }

        .avatar {
            border-radius: 50%;
        }

        .footer {
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #eaeaea;
            text-align: center;
            color: #6b7280;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">PayIt Receipt</div>
            <div class="date">{{ $order->created_at->format('F j, Y') }}</div>
        </div>

        <div class="order-info">
            <div class="order-details">
                <div class="order-id">Order #{{ $order->id }}</div>
                <div>
                    <span class="status status-{{ strtolower($order->status) }}">{{ $order->status }}</span>
                </div>
                <div>Payment Method: {{ ucfirst($order->payment_method) }}</div>
                <div>Reference: {{ $order->payment_reference }}</div>
            </div>
            <div class="user-details">
                <img class="avatar"
                    src="https://ui-avatars.com/api/?name={{ urlencode($order->user->name) }}&size=48&background=random"
                    alt="User Avatar">
                <div>{{ $order->user->name }}</div>
                <div>{{ $order->user->email }}</div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if ($order->file)
                            {{ $order->file->name }}
                        @else
                            File Purchase
                        @endif
                    </td>
                    <td>
                        @if ($order->file)
                            {{ \Str::limit($order->file->description, 100) }}
                        @else
                            Digital content purchase
                        @endif
                    </td>
                    <td class="amount">${{ number_format($order->amount, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="2">Total</td>
                    <td class="amount">${{ number_format($order->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Thank you for your purchase! For any questions, please contact support.</p>
            <p>&copy; {{ date('Y') }} PayIt. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
