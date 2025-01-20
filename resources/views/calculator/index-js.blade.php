<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form id="calculator-form" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @csrf
                        <div class="flex flex-col">
                            <label for="number1" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number 1</label>
                            <input type="number" name="a" id="number1" class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-1" required>
                        </div>
                        <div class="flex flex-col">
                            <label for="number2" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number 2</label>
                            <input type="number" name="b" id="number2" class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-1" required>
                        </div>
                        <div class="flex flex-col">
                            <label for="operation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Operation</label>
                            <select name="operation" id="operation" class="mt-1 block w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-1" required>
                                <option value="addition">Add</option>
                                <option value="subtraction">Subtract</option>
                                <option value="multiplication">Multiply</option>
                                <option value="division">Divide</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 dark:bg-blue-700 text-white rounded-md shadow-sm hover:bg-blue-600 dark:hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Calculate</button>
                        </div>
                    </form>

                    <div id="result" class="mt-4 p-4 bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-200 rounded-md" style="display: none;">
                        Result: <span id="result-value"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('calculator-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const data = {
                a: formData.get('a'),
                b: formData.get('b'),
                operation: formData.get('operation')
            };

            fetch('{{ route('api.calculate') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById('result-value').textContent = data.result;
                    document.getElementById('result').style.display = 'block';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</x-app-layout>
