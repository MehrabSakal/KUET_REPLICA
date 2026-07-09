<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Verification - KUET Replica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Student Verification</h1>
            <p class="text-gray-600 mt-2">Please enter your Student ID to continue</p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('student.verify.submit') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="student_id" class="block text-gray-700 font-medium mb-2">Student ID</label>
                <input type="text" id="student_id" name="student_id" value="{{ old('student_id') }}" required placeholder="e.g. 1907001" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-200">
                Verify
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="/" class="text-blue-500 hover:underline text-sm">Return to Home</a>
        </div>
    </div>

</body>
</html>
