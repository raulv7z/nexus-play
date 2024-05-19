@if (session('error'))
    <div class="bg-red-600 text-white px-6 py-4 border-0 rounded-lg relative mb-4 shadow-md dark:bg-red-800">
        <div class="flex items-center">
            <div class="h-6 w-6 mr-4">
                <svg class="fill-current h-full w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 0c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-1-13h2v6h-2v-6zm0 8h2v2h-2v-2z" />
                </svg>
            </div>
            <div>
                <p class="text-base font-medium">{{ __(session('error')) }}</p>
            </div>
        </div>
    </div>
@endif