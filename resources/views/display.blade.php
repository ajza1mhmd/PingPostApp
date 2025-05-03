<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Live Notices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold">Live Notice</h3>
                    <div id="noticeFeed" class="space-y-4 mt-4">
                        <!--  notic will appear here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="module">
  echo.channel('notices')
        .listen('NoticePublished', (event) => {
            const noticeFeed = document.getElementById('noticeFeed');
            const newNotice = document.createElement('div');
            newNotice.classList.add('bg-gray-100', 'p-4', 'rounded-lg', 'text-gray-900', 'dark:bg-gray-700', 'dark:text-gray-100');
            newNotice.textContent = event.message; // Display the message from the event
            noticeFeed.prepend(newNotice); // Add the new notice at the top
        });
</script>

