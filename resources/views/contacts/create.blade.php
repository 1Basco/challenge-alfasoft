@extends('contacts.layout')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold">Create Contact</h2>
                <a href="{{ route('contacts.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
                    Back to Contacts
                </a>
            </div>
            <div class="bg-gray-50 overflow-hidden shadow-md sm:rounded-lg mt-4">
                <form action="{{ route('contacts.store') }}" method="POST" class="p-6">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" minlength="5" name="name" id="name" class="mt-1 h-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" required>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 h-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" required>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" id="phone" pattern="[0-9]{9}" class="mt-1 h-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" required>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                            Create Contact
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection