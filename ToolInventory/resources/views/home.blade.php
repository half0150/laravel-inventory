<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Category Creation Form -->
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category Name</label>
                        <input type="text" name="category" id="category" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border bg rounded-md font-semibold text-s text-black mt-2">
                            Create Category
                        </button>
                    </div>
                </form>

                <!-- Tool Creation Form -->
                <form action="{{ route('tools.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category_id" id="category_id" class="form-select rounded-md shadow-sm mt-1 block w-16" required>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <input name="tool_name" id="tool_name" placeholder="Tool Name" /><br>
                        <input name="image" id="image" type="file" accept="image/jpeg, image/png">
                    </div>
                    <!-- Add more fields as needed -->
                    <div class="mt-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border bg rounded-md font-semibold text-s text-black">
                            Add Tool
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tool Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tools as $tool)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{$tool->categoryTool->category}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{$tool->tool_name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap"><img src="{{ $tool->image }}" alt="{{ $tool->tool_name }}" class="w-16 h-16"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>