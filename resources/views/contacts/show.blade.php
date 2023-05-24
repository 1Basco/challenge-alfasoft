@extends('contacts.layout')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold">Contact Details</h2>
                <div class="flex gap-4">
                    <a href="{{ route('contacts.edit', $contact) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                        Edit Contact
                    </a>
                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                            Delete Contact
                        </button>
                    </form>
                </div>
            </div>
            <div class="bg-gray-50 overflow-hidden shadow-md sm:rounded-lg mt-4">
                <div class="p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $contact->name }}</p>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $contact->email }}</p>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $contact->contact }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection