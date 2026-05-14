<<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medicine Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-end">
                        <button class="border border-black p-2 rounded-md bg-slate-700 text-white"><a href="{{ route('medicines.create')}}"> Add Medicine</a></button>
                    </div>
                    
                    <div>
                        <table class="w-full text-sm text-left">
                            <thead>
                                <th class="px-4 py-2 font-medium text-gray-500 border-b border-gray-200">Medicine Name</th>
                                <th class="px-4 py-2 font-medium text-gray-500 border-b border-gray-200">Generic Name</th>
                                <th class="px-4 py-2 font-medium text-gray-500 border-b border-gray-200">Category</th>
                                <th class="px-4 py-2 font-medium text-gray-500 border-b border-gray-200">Quantity</th>
                                <th class="px-4 py-2 font-medium text-gray-500 border-b border-gray-200">Expiration Date</th>
                                <th class="px-4 py-2 font-medium text-gray-500 border-b border-gray-200">Price</th>
                                <th class="px-4 py-2 font-medium text-gray-500 border-b border-gray-200">Status</th>
                                <th class="px-4 py-2 font-medium text-gray-500 border-b border-gray-200">Action</th>
                            </thead>
                            <tbody>
                                @forelse ( $medicines as $medicine )
                                <tr>
                                    <td class="px-4 py-2 border-b border-gray-100">{{$medicine->medicine_name}}</td>
                                    <td class="px-4 py-2 border-b border-gray-100">{{$medicine->generic_name}}</td>
                                    <td class="px-4 py-2 border-b border-gray-100">{{$medicine->category}}</td>
                                    <td class="px-4 py-2 border-b border-gray-100">{{$medicine->quantity}}</td>
                                    <td class="px-4 py-2 border-b border-gray-100">{{$medicine->expiration_date}}</td>
                                    <td class="px-4 py-2 border-b border-gray-100">{{$medicine->price}}</td>
                                    <td class="px-4 py-2 border-b border-gray-100">{{$medicine->status}}</td>
                                    <td class="px-4 py-2 border-b border-gray-100">
                                        <div class="flex gap-2">
                                            <a href="{{ route('medicines.edit', $medicine) }}"
                                            class="block px-4 py-2 rounded-md bg-gray-600 text-white text-center text-sm">
                                                Edit Medicine
                                            </a>

                                            <form action="{{ route('medicines.destroy', $medicine) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-4 py-2 rounded-md bg-red-600 text-white text-sm">
                                                    Delete Medicine
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-6 text-gray-400">
                                            No medicine found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="m-4 py-6">
                    <a href="/export-excel" class="border border-green-400 p-2 rounded-md bg-green-500 text-white shadow-lg">
                        Export to Excel
                    </a>
            </div>
        </div>
    </div>
</x-app-layout>