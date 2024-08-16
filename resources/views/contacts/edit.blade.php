<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address', $contact->address) }}">
        </div>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('contacts.index') }}">Back to Contact List</a>
</body>
</html>
