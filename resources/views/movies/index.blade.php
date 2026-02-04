<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Bot Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">🎬 Movie Bot Admin Panel</h1>
        
        <div class="mb-4">
            <a href="{{ route('admin.movies.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                ➕ Add New Movie
            </a>
        </div>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Code</th>
                        <th class="py-3 px-4">Title</th>
                        <th class="py-3 px-4">Channel</th>
                        <th class="py-3 px-4">Message ID</th>
                        <th class="py-3 px-4">Views</th>
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movies as $movie)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $movie->id }}</td>
                        <td class="py-3 px-4 font-mono">{{ $movie->code }}</td>
                        <td class="py-3 px-4">{{ $movie->title }}</td>
                        <td class="py-3 px-4">{{ $movie->channel_username }}</td>
                        <td class="py-3 px-4">{{ $movie->message_id }}</td>
                        <td class="py-3 px-4">{{ $movie->views }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('admin.movies.edit', $movie) }}" 
                               class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                            <form action="{{ route('admin.movies.destroy', $movie) }}" 
                                  method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $movies->links() }}
        </div>
    </div>
</body>
</html>