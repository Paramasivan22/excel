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
            background-color: #f8f9fa;
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }
        .top-bar {
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            min-height: 80vh; /* Ensure it occupies a good portion of the viewport height */
            padding: 20px;
        }
        .form-container {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px; /* Control max width for better appearance */
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
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upload Students</h3>
                        </div>
                        <div class="card-body">
                            <!-- Upload Form -->
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
                            <form action="{{ route('influencers.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">Choose Excel File</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>