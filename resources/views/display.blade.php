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
<script>
        window.Echo.channel('notice-board')
        .listen('.NoticePublished', (e) => {
            console.log("Notice received:", e.message);
            const container = document.getElementById('noticeFeed');
            const newNotice = document.createElement('div');
            newNotice.classList.add('p-4', 'bg-blue-100', 'text-blue-800', 'rounded-lg', 'shadow');
            newNotice.innerText = e.message;

            container.prepend(newNotice);
        });
    </script>

