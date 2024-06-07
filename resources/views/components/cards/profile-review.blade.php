@props(['review'])

<div class="flex justify-center items-center p-3 rounded-lg bg-gray-100 dark:bg-gray-700">
    <div class="h-full">
        <p>
            {{ __($review->comment) }}
        </p>
    </div>
</div>