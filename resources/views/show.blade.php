<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Contact List</title>
</head>

<body>
    <div class="w-100 m-auto mt-10">
        <div class="w-100 flex justify-end">
            <div class="w-1/2 flex items-center justify-between mb-4 px-4">
                <p class="text-lg font-medium leading-6 text-sky-900">{{ $contact->name }}'s Info</p>
                <a href="{{ route('get.contact') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Back to Contact List</a>
            </div>
        </div>
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$contact->id}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$contact->name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$contact->email}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$contact->phone}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$contact->address}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$contact->created_at}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$contact->updated_at}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <a href="{{ route('edit.contact', ['id' => $contact->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('delete.contact', ['id' => $contact->id]) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>