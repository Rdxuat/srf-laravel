<!DOCTYPE html>
<html>

<head>
    <title>Upload Investor Excel</title>
</head>

<body>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('investors.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Select Excel/CSV File:</label>
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>

</body>

</html>