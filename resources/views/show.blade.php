<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="table table-hover mt-2 table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $studata)
                            <tr>

                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $studata->name }}</td>
                                <td>{{ $studata->email }}</td>
                                <td>{{ $studata->address->city ?? 'No city available' }}</td>
                                <td>{{ $studata->address->state ?? 'No state available' }}</td>
                                <td>
                                    @foreach ($studata->subjects as $subjects)
                                        {{ $subjects->subjectname }}
                                    @endforeach
                                </td>
                                <td><a href="{{ route('edit', $studata->id) }}" class="btn btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('destroy', $studata->id) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn delete-btn btn-danger delete-btn">Delete</button>
                                    </form>
                                </td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</body>

</html>
