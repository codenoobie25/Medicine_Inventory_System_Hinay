<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Medicine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="{{ route('medicines.store')}}" method="POST">
                    @csrf

                    <x-input-label>Medicine Name:</x-input-label>
                    <x-text-input type="text" name="medicine_name"></x-text-input>

                    <x-input-label>Generic Name:</x-input-label>
                    <x-text-input type="text" name="generic_name"></x-text-input>
                    
                    <x-input-label>Category:</x-input-label>
                    <select name="category">
                        @foreach ($categories as $category)
                            <option value="{{$category}}">{{$category}}</option>
                        @endforeach
                    </select>

                    <x-input-label>Quantity:</x-input-label>
                    <x-text-input type="number" name="quantity"></x-text-input>

                    <x-input-label>Expiration Date:</x-input-label>
                    <x-text-input type="date" name="expiration_date"></x-text-input>
                    
                    <x-input-label>Price:</x-input-label>
                    <x-text-input type="number" name="price"></x-text-input>
                    
                    <x-input-label>Status:</x-input-label>
                    <select name="status">
                        @foreach ($condition as $status)
                            <option value="{{$status}}">{{$status}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="p-2 border border-blue-400 rounded-sm"> Add Medicine </button>

                            @if ($errors->any())
                        <ul class="text-red-500 text-sm mb-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                            @endif
                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
