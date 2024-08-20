<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-size: contain; /* Ensure the image fits within the viewport */
            background-attachment: fixed; /* Keep background fixed */
            background-color: #f8f9fa; /* Fallback color */
            margin: 0;
            padding: 0;
            color: #333; /* Dark text color for better readability */
        }
        .top-bar {
            background-color: rgba(248, 249, 250, 0.8); /* Slightly transparent background */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 10; /* Ensure it stays above content */
        }
        .top-bar .logo img {
            height: 40px;
            width: auto;
        }
        .top-bar .nav-buttons a {
            color: #343a40;
            margin: 0 10px;
            font-size: 1.2rem;
            text-decoration: none;
        }
        .top-bar .nav-buttons a:hover {
            color: #007bff;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh; /* Full height */
            padding: 20px;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px; /* Adjust max width as needed */
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="logo">
            <img src="{{ asset('images/Gr.png') }}" alt="Logo"><strong>Herody</strong>
        </div>
        <div class="nav-buttons">
            <a href=""><i class="fas fa-home"></i></a>
            <a href="#"><i class="fas fa-info-circle"></i></a>
            <a href="#"><i class="fas fa-cogs"></i></a>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="form-container">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Names</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="last">Last</label>
                    <input type="text" class="form-control" id="last" name="last" value="{{ old('last') }}" required>
                    @if ($errors->has('last'))
                        <span class="text-danger">{{ $errors->first('last') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}" required>
                    @if ($errors->has('number'))
                        <span class="text-danger">{{ $errors->first('number') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
            <h2 class="text-center mt-4">Upload File</h2>
            <form action="{{ route('import_excel_post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Files</label>
                    <input type="file" class="form-control-file" name="excel_file" id="file">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Upload</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
