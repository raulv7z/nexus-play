{{-- ! CHANGE TO VANILLA CSS, NOT TAILWIND CSS --}}

@props(['invoice', 'user'])

<div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
    <h1 class="font-bold text-2xl my-4 text-center text-blue-300">Nexus Play</h1>
    <hr class="mb-2">
    <div class="flex justify-between mb-6">
        <h1 class="text-lg font-bold">Invoice</h1>
        <div class="text-gray-700">
            <div>Date: {{ $invoice->issued_at }}</div>
            <div>Invoice #: {{ $invoice->invoice_number }}</div>
        </div>
    </div>
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4">Bill To:</h2>
        <div class="text-gray-700 mb-2">{{ $user->name }}</div>
        <div class="text-gray-700">{{ $user->email }}</div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold text-gray-700">Game</th>
                <th class="text-right font-bold text-gray-700">Platform</th>
                <th class="text-right font-bold text-gray-700">Quantity</th>
                <th class="text-right font-bold text-gray-700">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->entries as $entry)
                <tr>
                    <td class="text-left text-gray-700">{{ $entry->videogame_name }}</td>
                    <td class="text-right text-gray-700">{{ $entry->platform_name }}</td>
                    <td class="text-right text-gray-700">{{ $entry->quantity }}</td>
                    <td class="text-right text-gray-700">${{ number_format($entry->unit_amount, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td class="text-left font-bold text-gray-700">Base Amount</td>
                <td></td>
                <td class="text-right font-bold text-gray-700">${{ number_format($invoice->base_amount, 2) }}</td>
            </tr>
            <tr>
                <td class="text-left font-bold text-gray-700">Total</td>
                <td></td>
                <td class="text-right font-bold text-gray-700">${{ number_format($invoice->full_amount, 2) }}</td>
            </tr>
        </tfoot>
    </table>
    <div class="text-gray-700 mb-2">Thank you for your business!</div>
    <div class="text-gray-700 text-sm">Please remit payment within 30 days.</div>
</div>