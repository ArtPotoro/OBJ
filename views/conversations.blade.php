<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header"><b>Conversation: {{ $title }}</b></div>
                <div class="card-body">
                    <form action="" method="POST">
                        <a href="" class="btn  btn-success float-end">New Contact Information</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer ID</th>
                                <th>Date</th>
                                <th>Conversation</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($conversations as $conversation)
                                <tr>
                                    <td>{{ $conversation->id }}</td>
                                    <td>{{ $conversation->customer_id }}</td>
                                    <td>{{ $conversation->date }}</td>
                                    <td>{{ $conversation->conversation }}</td>
                                    <td><a class="btn btn-info" href="?delete_id={{ $conversation->id }}">Istrinti</a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>