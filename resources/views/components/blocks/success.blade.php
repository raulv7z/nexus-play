@if (session('success'))
    <div id="success-alert" class="fixed bottom-4 left-4 bg-green-600 text-white px-6 py-4 border-0 rounded-lg shadow-lg dark:bg-green-800 z-50">
        <div class="flex items-center">
            <div class="h-6 w-6 mr-4">
                <svg class="fill-current h-full w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm-1 15l-5-5 1.414-1.414L9 12.172l4.586-4.586L15 9l-6 6z" />
                </svg>
            </div>
            <div>
                <p class="text-base font-medium">{{ __(session('success')) }}</p>
            </div>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="ml-4 focus:outline-none">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
@endif