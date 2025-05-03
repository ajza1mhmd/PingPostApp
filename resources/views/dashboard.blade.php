<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("Hi! , Ajzal...") }} --}}
                    <div class="w-full max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-2xl">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4"> Whiteboard Editor</h2>
                        <form action="{{ route('notices.store') }}" method="POST">
                            @csrf
                                <textarea id="whiteboardEditor" name="message" rows="6" placeholder="Type your notice here..."
                                    class="w-full p-4 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                                <button id="publishNotice" class="mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                     Publish Notice
                                </button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>