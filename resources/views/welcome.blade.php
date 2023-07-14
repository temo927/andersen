<style>
    /* Add your custom styles here */

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background: #f7f7f7;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    form input[type="text"],
    form input[type="email"],
    form textarea {
        width: 100%;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    form textarea {
        resize: vertical;
        min-height: 80px;
    }

    form .alert-danger {
        color: red;
        margin-top: 5px;
    }

    form button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        background: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    form button[type="submit"]:hover {
        background: #45a049;
    }

    .responses {
        margin-top: 20px;
        padding-top: 10px;
        border-top: 1px solid #ccc;
    }
    .responses table {
        width: 100%;
        border-collapse: collapse;
    }

    .responses table th,
    .responses table td {
        padding: 8px;
        border: 1px solid #ccc;
    }

    .responses table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
</style>

<form method="POST" action="{{ route('welcome.submit') }}">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" pattern="[A-Za-z]+" title="Only letters are allowed" required>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>

@if ($responses->isNotEmpty())
    <div class="responses">
        <h2>Responses:</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responses as $response)
                    <tr>
                        <td>{{ $response->name }}</td>
                        <td>{{ $response->email }}</td>
                        <td>{{ $response->message }}</td>
                        <td>{{ $response->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif