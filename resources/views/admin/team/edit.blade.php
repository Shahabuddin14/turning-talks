<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Teams') }}
            <span><a href="{{ url('teams') }}"><button class="float-right text-blue-800">Go Back</button></a></span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- component -->
                <div class="bg-gray-200 min-h-screen pt-2 font-mono my-16">
                    <div class="container mx-auto">
                        <div class="inputs w-full max-w-2xl p-6 mx-auto">
                            <h2 class="text-2xl text-gray-900">Edit member</h2>
                            @if(Session::get('message'))
                                <h2 class="text-2xl text-green-900">{{ Session::get('message') }}</h2>
                            @endif
                            <form class="mt-6 border-t border-gray-400 pt-2" method="post" action="{{ url('teams/' .$team->id) }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class='flex flex-wrap -mx-3 mb-6'>
                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Member Name</label>
                                        <input name="name" value="{{ $team->name }}" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter member name'  required>
                                    </div>
                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' >Member Designation</label>
                                        <textarea name="designation" class='bg-gray-100 rounded-md border leading-normal resize-none w-full h-20 py-2 px-3 shadow-inner border border-gray-400 font-medium placeholder-gray-700 focus:outline-none focus:bg-white'  required>{{ $team->designation }}</textarea>
                                    </div>
                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Member Facebook Profile</label>
                                        <input name="facebook" value="{{ $team->facebook }}" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter blog title'  required>
                                    </div>
                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Member LinkedIn Profile</label>
                                        <input name="youtube" value="{{ $team->youtube }}" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='text' placeholder='Enter blog title'  required>
                                    </div>

                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='grid-text-1'>Member Image</label>
                                        <input name="photo" class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='grid-text-1' type='file'>
                                        <img src="{{ asset($team->photo) }}" alt="" class="img-fluid" width="320">
                                    </div>


                                    <div class="personal w-full border-gray-400 pt-4">
                                        <div class="flex justify-end">
                                            <button class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
