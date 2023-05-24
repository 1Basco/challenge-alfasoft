@extends('contacts.layout')

@section('content')

@if ($errors->any())

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Some problems with your inputs</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
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
                            <input type="text" minlength="6" name="name" id="name" class="mt-1 h-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" required>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 h-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" required>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label for="contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
                            <input type="tel" name="contact" id="contact" maxlength="9" pattern="[0-9]{9}" class="mt-1 h-8 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" required>
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