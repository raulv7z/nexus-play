<!-- Modal toggle -->
<button data-modal-target="review-modal" data-modal-toggle="review-modal"
    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    type="button">
    {{ __('Rate this game') }}
</button>

<!-- Main modal -->
<div id="review-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <!-- Modal gray background -->
    <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-900 opacity-70 dark:opacity-80"></div>
    </div>

    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ __('New review') }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="review-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">{{__("Close modal")}}</span>
                </button>
            </div>

            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="rating"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Give a rating') }}</label>
                        <input type="hidden" class="ratingHidden" name="rating"/>
                        <div class="flex items-center">
                            <x-games.rating :reactive="true">
                            </x-games.rating>
                        </div>

                    </div>

                    <div class="col-span-2">
                        <label for="comment"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('New comment') }}</label>
                        <textarea id="comment" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write a comment here with at least 120 words." required></textarea>
                    </div>

                </div>

                <x-buttons.submit :text="'Send review'">
                </x-buttons.submit>
            </form>
        </div>
    </div>
</div>
