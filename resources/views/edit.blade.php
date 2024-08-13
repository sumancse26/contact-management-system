<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Contact</title>

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
        <form action="{{ route('update.contact', ['id' => $contact->id]) }}" method="POST" enctype="multipart/form-data" class="w-1/3 m-auto border-2 border-gray-200 p-4 rounded-lg">
            @csrf
            @method('PUT')
            <p class="block text-lg font-medium leading-6 text-sky-900 m-0 text-center ">Edit Contact</p>
    
            <div class="mb-3 border-b-2 border-gray-500">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text"  autocomplete class="ps-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none" value="{{ $contact->name}}">
                    </div>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email"   autocomplete="email" class="ps-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none" value="{{ $contact->email}}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                    <div class="mt-2">
                        <input id="phone" name="phone" type="text"  autocomplete class="ps-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none" value="{{ $contact->phone}}">
                    
                    </div>
                    
                </div>
                <div class="sm:col-span-4 mb-5">
                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                    <div class="mt-2">
                        <input id="address" name="address" type="text"   autocomplete class="ps-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 outline-none" value="{{ $contact->address}}">
                    </div>
                </div>
            </div>
    
    
            <div class="flex items-center justify-center gap-3 ">
                <a href="{{ route('get.contact') }}" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">Save</button>
            </div>
        </form>
    </div>
</body>

</html>