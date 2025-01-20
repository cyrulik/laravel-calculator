<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('calculate') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @csrf
                        <div class="flex flex-col">
                            <label for="number1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number 1</label>
                            <input type="number" name="a" id="number1" class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-1" required value="{{ old('a') }}">
                            @error('a')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="number2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number 2</label>
                            <input type="number" name="b" id="number2" class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-1" required value="{{ old('b') }}">
                            @error('b')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="operation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Operation</label>
                            <select name="operation" id="operation" class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-1" required>
                                <option value="addition">Add</option>
                                <option value="subtraction">Subtract</option>
                                <option value="multiplication">Multiply</option>
                                <option value="division">Divide</option>
                            </select>
                            @error('operation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 dark:bg-blue-700 text-white rounded-md shadow-sm hover:bg-blue-600 dark:hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Calculate</button>
                        </div>
                    </form>

                    @if(isset($result))
                        <div class="mt-4 p-4 bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-200 rounded-md">
                            Result: {{ $result }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
