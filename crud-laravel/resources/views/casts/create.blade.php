<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Cast</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('casts.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Name</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="umur">Age</label>
                                <input type="text" class="form-control" id="umur" name="umur" value="{{ old('umur') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" id="bio" name="bio" required>{{ old('bio') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('casts.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>