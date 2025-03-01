<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    @include('header')

    <div class="container mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card mt-3 p-3">
                        <h2 class="mb-4 text-center">Edit Student Data</h2>
                        <form action="{{ route('update', $students->id) }}" method="POST">

                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{$students->name}}" required>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control"  value=" {{ $students->email }}" required>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">city:</label>
                                <input type="text" name="city" class="form-control"  value=" {{ $students->address->city }}" required>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">state:</label>
                                <input type="text" name="state" class="form-control" value=" {{ $students->address->state }}" required>
                            </div>


                            <h3>Add Student Subjects</h3>
                            <div id="subject-container" style="border:2px solid gray;padding=25px;margin:10px;border-radious=5px">
                                <div class="subject-group">
                                    <div class="mb-3">
                                        <label class="form-label">Subject:</label>
                                        <input type="text" name="subjectname[]" class="form-control"  required>

                                    </div>
                                    <button type="button" class="remove-subject" style="display:none;">Remove</button>
                                </div>
                            </div>

                            <button type="button" id="add-subject" class="btn btn-success">Add More</button><br><br>

                            <!-- <a href="login"></a> -->
                            <button type="submit" class="btn btn-primary">Update</button>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script>
    $(document).ready(function() {
        let subIndex = 1;

        $("#add-subject").click(function() {
            $("#subject-container").append(`
                <div class="subject-group">

                            <div class="mb-3">
                                        <label class="form-label">Subject:</label>
                                        <input type="text" name="subjectname[]" class="form-control" required>

                                    </div>
                          <button type="button " class="btn remove-subject mb-3 btn-danger">Remove</button>
                </div>
            `);
            subIndex++;
        });

        $(document).on("click", ".remove-subject", function() {
            $(this).parent().remove();
        });
    });
</script>

</html>
