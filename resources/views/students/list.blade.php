<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students List</title>
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
        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-container input {
            border-radius: 25px;
            padding: 10px 20px;
            border: 1px solid #ced4da;
            width: 100%;
            max-width: 500px;
            margin-left: 10px;
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
            <h1 class="mb-4">Students</h1>
            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" id="search" class="form-control" placeholder="Search students...">
            </div>
            <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>College Name</th>
                        <th>Designation</th>
                        <th>Society</th>
                    </tr>
                </thead>
                <tbody id="studentTable">
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
                    $('#studentTable').html('');
                    return;
                }
                $.ajax({
                    url: "{{ route('students.search') }}",
                    type: "GET",
                    data: {'search': query},
                    success: function(data) {
                        $('#studentTable').html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>
