<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
</head>
<body>
    <h1>Contact List</h1>

    <!-- Search form -->
    <form action="{{ route('contacts.index') }}" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email">
        <button type="submit">Search</button>
    </form>

    <!-- Sorting links -->
    <a href="{{ route('contacts.index', ['sort_by' => 'name', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}">Sort by Name</a>
    <a href="{{ route('contacts.index', ['sort_by' => 'created_at', 'sort_order' => request('sort_order') == 'asc' ? 'desc' : 'asc']) }}">Sort by Date</a>

    <!-- Contact list -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}">View</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('contacts.create') }}">Create New Contact</a>
</body>
</html>
