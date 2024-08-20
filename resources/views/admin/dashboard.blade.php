<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #faf8f8;
            margin: 0;
            padding: 0;
        }
        .top-bar {
            background-color: #fff;
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
        .nav-bar {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px; /* Increased gap between grid items */
            padding: 20px;
            border-radius: 10px;
            margin: 20px auto; /* Center the nav-bar and add margin at the top and bottom */
            max-width: 900px; /* Set a maximum width to control the size */
            width: 100%; /* Ensure it takes up the full width of its container */
        }
        .nav-item {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 10px; /* Rounded corners */
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
            font-size: 1.5rem;
            color: #333;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); /* Inner shadow for the cave edge effect */
        }
        .nav-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow on hover */
            background-color: #007bff;
            color: #fff;
        }
        .nav-item i {
            color: #007bff; /* Default icon color */
        }
        .nav-item a {
            color: #333; /* Default color for icons */
            text-decoration: none; /* Ensure the icons don't have underlines */
        }
        .nav-item a:hover {
            color: #cef6b0; /* Color when hovering over the icon */
        }
        .nav-item:hover i {
            color: #cef6b0; /* Icon color on hover */
        }
        .nav-item div {
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }
        .search-container input {
            border-radius: 25px;
            padding: 10px 20px;
            border: 1px solid #ced4da;
            width: 100%;
            max-width: 500px;
        }
        .nav-buttons {
    display: flex;
    align-items: center; /* Align items vertically centered */
}

.nav-buttons a, .nav-buttons form {
    margin: 0; /* Remove default margins */
}

.logout-button {
    background: none; /* Remove button background */
    border: none; /* Remove button border */
    padding: 0; /* Remove button padding */
    cursor: pointer; /* Change cursor to pointer */
    margin-left: 10px; /* Add space between the icons, adjust as needed */
}

.logout-button i {
    font-size: 12px; /* Adjust the icon size if needed */
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
            <a href="#"><i class="fas fa-home"></i></a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="fas fa-sign-out-alt fa-xs"></i>
                </button>
            </form>  
        </div>
        
    </div>

    <!-- Navigation Bar -->
    <div class="container">
        <div class="nav-bar">
            <div class="nav-item">
                <a href="{{ route('import_excel_post') }}">
                    <i class="fas fa-file-upload"></i>
                    <div>Upload Users</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('students.create') }}">
                    <i class="fas fa-user-plus"></i>
                    <div>Upload Students</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('influencers.upload') }}">
                    <i class="fas fa-users"></i>
                    <div>Upload Influencers</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('users') }}">
                    <i class="fas fa-users-cog"></i>
                    <div>Users</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('students.list') }}">
                    <i class="fas fa-user-graduate"></i>
                    <div>Students</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('influencers.index') }}">
                    <i class="fas fa-user-tie"></i>
                    <div>Influencers</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="">
                    <i class="fas fa-tachometer-alt"></i>
                    <div>Dashboard</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="#">
                    <i class="fas fa-cogs"></i>
                    <div>Settings</div>
                </a>
            </div>
            <div class="nav-item">
                <a href="#">
                    <i class="fas fa-info-circle"></i>
                    <div>About</div>
                </a>
            </div>
        </div>
    </div>
 
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
