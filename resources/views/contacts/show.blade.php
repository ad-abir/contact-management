<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact</title>
</head>
<body>
    <h1>View Contact</h1>

    <div>
        <strong>Name:</strong> {{ $contact->name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $contact->email }}
    </div>
    <div>
        <strong>Phone:</strong> {{ $contact->phone }}
    </div>
    <div>
        <strong>Address:</strong> {{ $contact->address }}
    </div>

    <a href="{{ route('contacts.index') }}">Back to Contact List</a>
    <a href="{{ route('contacts.edit', $contact->id) }}">Edit Contact</a>
</body>
</html>
