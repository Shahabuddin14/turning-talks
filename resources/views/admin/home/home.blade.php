<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Container -->
            <div class="max-w-screen-xl mx-auto px-4">
                <!-- Grid wrapper -->
                <div class="-mx-4 flex flex-wrap">
                    <!-- Grid column -->
                    <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                        <!-- Column contents -->
                        <div class="px-10 py-12 bg-white rounded-lg shadow-lg text-center">
                            <a href="{{ url('blogs') }}">
                                <h4>Number of blog</h4>
                                <p>{{ $blog->count() }}</p>
                            </a>
                        </div>
                    </div>

                    <!-- Grid column -->
                    <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                        <!-- Column contents -->
                        <div class="px-10 py-12 bg-white rounded-lg shadow-lg text-center">
                            <a href="{{ url('service') }}">
                                <h4>Number of service</h4>
                                <p>{{ $service->count() }}</p>
                            </a>
                        </div>
                    </div>

                    <!-- Grid column -->
                    <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                        <!-- Column contents -->
                        <div class="px-10 py-12 bg-white rounded-lg shadow-lg text-center">
                            <a href="{{ url('teams') }}">
                                <h4>Number of member</h4>
                                <p>{{ $teams->count() }}</p>
                            </a>
                        </div>
                    </div>

                    <!-- Grid column -->
                    <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                        <!-- Column contents -->
                        <div class="px-10 py-12 bg-white rounded-lg shadow-lg text-center">
                            <a href="{{ url('photos') }}">
                                <h4>Number of photo</h4>
                                <p>{{ $photo->count() }}</p>
                            </a>
                        </div>
                    </div>

                    <!-- Grid column -->
                    <div class="w-full p-4 sm:w-1/2 lg:w-1/4">
                        <!-- Column contents -->
                        <div class="px-10 py-12 bg-white rounded-lg shadow-lg text-center">
                            <a href="{{ url('slides') }}">
                                <h4>Number of slide</h4>
                                <p>{{ $slide->count() }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
