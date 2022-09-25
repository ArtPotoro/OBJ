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
                <div class="card-header"><b>Customer: {{ $title }}</b></div>
                <div class="card-body">
                    <form action="" method="POST">
                        <a href="" class="btn  btn-success float-end">New Customer</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Positions</th>
                                <th>Company ID</th>
                                <th>Company Name</th>
                                <th>Conversation</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->surname }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->positions }}</td>
                                    <td>{{ $customer->company_id }}</td>
                                    <td>{{ $customer->getCompany($customer->company_id)->company_name }}</td>
                                    <td>{{ $customer->getCon($customer->id)->conversation }}</td>
                                    <td><a class="btn btn-info" href="?delete_id={{ $customer->id }}">Istrinti</a> </td>
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