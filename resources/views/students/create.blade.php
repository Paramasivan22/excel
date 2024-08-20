<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
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
    </style>
</head>
<body>

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
    <div class="container mt-5">
        <h2>Add Student</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name_of_students">Name</label>
                <input type="text" class="form-control" id="name_of_students" name="name_of_students" value="{{ old('name_of_students') }}" required>
                @if ($errors->has('name_of_students'))
                    <span class="text-danger">{{ $errors->first('name_of_students') }}</span>
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
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                @if ($errors->has('phone_number'))
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="college_name">College Name</label>
                <input type="text" class="form-control" id="college_name" name="college_name" value="{{ old('college_name') }}">
                @if ($errors->has('college_name'))
                    <span class="text-danger">{{ $errors->first('college_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation') }}">
                @if ($errors->has('designation'))
                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="society">Society</label>
                <input type="text" class="form-control" id="society" name="society" value="{{ old('society') }}">
                @if ($errors->has('society'))
                    <span class="text-danger">{{ $errors->first('society') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
        <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose file</label>
                <input type="file" name="file" id="file" class="form-control" accept=".xlsx, .xls, .csv" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" style="width: 150px;">Upload</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
