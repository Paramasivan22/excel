<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Influencers List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
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
            padding: 20px;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
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
        <div class="container">
            <h1 class="mb-4">Influencers</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Influencer Button -->
            <div class="mb-3">
                <a href="{{ route('influencer.create') }}" class="btn btn-primary">Add Influencer</a>
                <div class="search-container">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search" class="form-control" placeholder="Search influencers...">
                </div>
            </div>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>YouTube Link</th>
                        <th>Instagram Link</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody id="influencerTable">
                    <!-- Table initially empty -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();
                if (query.length === 0) {
                    $('#influencerTable').html('');
                    return;
                }
                $.ajax({
                    url: "{{ route('influencer.search') }}",
                    type: "GET",
                    data: {'search': query},
                    success: function(data) {
                        $('#influencerTable').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>
