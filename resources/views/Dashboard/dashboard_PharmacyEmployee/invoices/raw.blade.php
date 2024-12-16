<div style="width: 300px; font-family: Arial, sans-serif;">
    <h3>Invoice #{{ $invoice->invoice_number }}</h3>
    <p>Date: {{ $invoice->created_at->format('F j, Y') }}</p>
    <hr>
    <table style="width: 100%; font-size: 12px;">
        <thead>
            <tr>
                <th>Medicine</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->medicines as $medicine)
                <tr>
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->pivot->quantity }}</td>
                    <td>${{ number_format($medicine->pivot->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <h4>Total: ${{ number_format($invoice->total, 2) }}</h4>
    <p>Thank you for your purchase!</p>
</div>
