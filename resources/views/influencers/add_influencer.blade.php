<!-- resources/views/add_influencer.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Influencer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Influencer</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('influencer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name_of_influencer">Name</label>
                <input type="text" class="form-control" id="name_of_influencer" name="name_of_influencer" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="youtube_link">YouTube Link</label>
                <input type="url" class="form-control" id="youtube_link" name="youtube_link">
            </div>
            <div class="form-group">
                <label for="instagram_link">Instagram Link</label>
                <input type="url" class="form-control" id="instagram_link" name="instagram_link">
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="number" class="form-control" id="cost" name="cost">
            </div>
            <button type="submit" class="btn btn-primary">Add Influencer</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
