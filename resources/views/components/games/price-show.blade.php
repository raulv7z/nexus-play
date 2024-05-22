@props(['amount' => 0.00])

<p class="text-4xl font-bold text-pink-600 dark:text-pink-400">
    {{ number_format($amount, 2) }}&nbsp;<span class="text-base">€</span>
</p>