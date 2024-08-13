<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite('resources/css/app.css') --}}
    <title>Create Contact</title>

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

        .alert {
            @apply fixed top-4 right-4 bg-green-500 text-white py-3 px-4 rounded-lg shadow-lg;
            animation: fadeOut 1s ease-in-out 2s forwards;
        }
        
    </style>
</head>

<body>
    @if ($errors->any())
        <div class="alert fixed top-4 right-4 bg-red-500 text-white py-3 px-4 rounded-lg shadow-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="h-screen flex items-center">
        <form action="{{ route('save.contact') }}" method="POST" class="w-1/3 m-auto border-2 border-gray-200 p-4 rounded-lg">
            @csrf
            <p class="block text-lg font-medium leading-6 text-sky-900 m-0 text-center ">Create New Contact</p>
    
            <div class="mb-3 border-b-2 border-gray-500">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete class="ps-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none">
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <input id="email" name="email" type="text" value="{{ old('email') }}" autocomplete="email" class="ps-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none">
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                    <div class="mt-2">
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" autocomplete class="ps-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none">
                    </div>
                </div>
                <div class="sm:col-span-4 mb-5">
                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                    <div class="mt-2">
                        <input id="address" name="address" type="text" value="{{ old('address') }}" autocomplete class="ps-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none">
                    </div>
                </div>
            </div>
    
    
            <div class="mt-6 flex items-center justify-center gap-3">
                <a href="{{ route('get.contact') }}" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</body>

</html>