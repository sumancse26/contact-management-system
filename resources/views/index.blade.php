<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Contact List</title>
    <style>
        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        .toast {
            @apply fixed top-4 right-4 bg-green-500 text-white py-3 px-4 rounded-lg shadow-lg;
            animation: fadeOut 1s ease-in-out 4s forwards;
        }
        
    </style>
</head>

<body>
    @if(session('success'))
    <div class="toast fixed top-4 right-4 bg-green-500 text-white py-3 px-4 rounded-lg shadow-lg">
        <p class="font-semibold">{{ session('success') }}</p>
    </div>
    @endif

    @if(session('error'))
    <div class="error-toast fixed top-4 right-4 bg-red-500 text-white py-3 px-4 rounded-lg shadow-lg"">
        <p class="font-semibold">{{ session('error') }}</p>
    </div>
    @endif


    <div class="w-100 m-auto mt-3">
        <div class="flex flex-col gap-2">
            <div class="flex items-center w-full max-w-full">
                <form action="{{ route('search.contact') }}" method="GET" class="flex items-center w-full justify-center">
                    @csrf
                    <input type="text" name="query" placeholder="Search..." value="{{ request()->input('query') }}" class="w-1/2 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit" class="px-2 py-2 text-white bg-blue-500 border-l border-blue-500 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Search</button>
                </form>
            </div>

           
            <div class="flex align-center gap-5 mb-1 ms-3">
                <a href="{{ route('search.contact', array_merge(request()->query(), ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="rounded-md bg-cyan-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Sort by Name</a>
                <a href="{{ route('search.contact', array_merge(request()->query(), ['sort' => 'created_at', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc'])) }}" class="rounded-md bg-sky-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-600">Sort by Date</a>
            </div>

            <div class="w-100 flex justify-end">
            
                <div class="w-1/2 flex items-center justify-between px-2">
                    <p class="text-lg font-medium leading-6 text-sky-900">Contact List</p>
                    <a href="{{ route('create.form') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Contact</a>
                </div>
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
                    @foreach($contacts as $contact)
                    <tr class="cursor-pointer" onclick="window.location.href='{{ route('show.contact', ['id' => $contact->id]) }}'">
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
