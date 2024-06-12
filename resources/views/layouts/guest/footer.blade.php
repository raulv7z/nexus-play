<footer style="box-shadow: 0 -1px 2px 0 rgba(0, 0, 0, 0.05);" class="w-full bg-white dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="2xl:flex 2xl:justify-between">
            <div class="mb-6 2xl:mb-0">
                <a href="/" class="flex items-center content-center">
                    <img src="{{ Storage::url('images/interface/logo.svg') }}" class="h-10 me-3" alt="Nexus Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                        Nexus Play
                    </span>
                </a>
            </div>
            <div class="grid grid-cols-1 gap-8 sm:gap-6 sm:grid-cols-2 md:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                        {{ __('Links') }}
                    </h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="/home" class="hover:underline">
                                {{ __("Home") }}
                            </a>
                        </li>
                        <li>
                            <a href="/login" class="hover:underline">
                                {{ __("Log In") }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                        {{ __('Follow us') }}
                    </h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="https://x.com/" class="hover:underline ">Twitter</a>
                        </li>
                        <li>
                            <a href="https://discord.com/" class="hover:underline">Discord</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                        {{ __('Legal') }}
                    </h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="{{route('root.company.contact-us')}}" class="hover:underline">{{ __('Contact Us') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="2xl:flex 2xl:items-center 2xl:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="localhost:8080"
                    class="hover:underline">Nexus Play™</a>. {{ __('All rights reserved.') }}
            </span>
            <div class="flex mt-5 sm:justify-center 2xl:mt-0">
                <a href="https://www.facebook.com/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 8 19">
                        <path fill-rule="evenodd"
                            d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="https://discord.com/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 21 16">
                        <path
                            d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                    </svg>
                    <span class="sr-only">Discord community</span>
                </a>
                <a href="https://x.com/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 17">
                        <path fill-rule="evenodd"
                            d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>
                <a href="https://www.instagram.com/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.206.058 2.036.244 2.517.511.56.303 1.012.698 1.44 1.126.428.428.823.88 1.126 1.44.267.48.453 1.311.511 2.517.058 1.267.07 1.646.07 4.851s-.012 3.584-.07 4.85c-.058 1.206-.244 2.036-.511 2.517-.303.56-.698 1.012-1.126 1.44-.428.428-.88.823-1.44 1.126-.48.267-1.311.453-2.517.511-1.267.058-1.646.07-4.851.07s-3.584-.012-4.85-.07c-1.206-.058-2.036-.244-2.517-.511-.56-.303-1.012-.698-1.44-1.126-.428-.428-.823-.88-1.126-1.44-.267-.48-.453-1.311-.511-2.517C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.058-1.206.244-2.036.511-2.517.303-.56.698-1.012 1.126-1.44.428-.428.88-.823 1.44-1.126.48-.267 1.311-.453 2.517-.511C8.416 2.175 8.796 2.163 12 2.163M12 0C8.741 0 8.332.013 7.052.072c-1.27.06-2.145.27-2.897.57-.784.317-1.465.742-2.146 1.423-.68.681-1.105 1.362-1.423 2.146-.3.752-.51 1.627-.57 2.897C.013 8.332 0 8.741 0 12c0 3.259.013 3.668.072 4.948.06 1.27.27 2.145.57 2.897.317.784.742 1.465 1.423 2.146.681.68 1.362 1.105 2.146 1.423.752.3 1.627.51 2.897.57 1.28.059 1.689.072 4.948.072s3.668-.013 4.948-.072c1.27-.06 2.145-.27 2.897-.57.784-.317 1.465-.742 2.146-1.423.68-.681 1.105-1.362 1.423-2.146.3-.752.51-1.627.57-2.897.059-1.28.072-1.689.072-4.948s-.013-3.668-.072-4.948c-.06-1.27-.27-2.145-.57-2.897-.317-.784-.742-1.465-1.423-2.146-.681-.68-1.362-1.105-2.146-1.423-.752-.3-1.627-.51-2.897-.57C15.668.013 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
                    </svg>
                    <span class="sr-only">Instagram page</span>
                </a>             
            </div>
        </div>
    </div>
</footer>
