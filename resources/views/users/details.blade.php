<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Users | Details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/vuejs-datatable.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">User Details</div>

                            <div class="card-body">

                                <h3 class="name-detail">{{$data['name']}}</h3>
                                <p class="name-detail">{{$data['address']['street'].', '.$data['address']['suite'].', '. $data['address']['city'].', '. $data['address']['zipcode']}}</p>
                                <p class="name-detail">{{$data['company']['name'].', '.$data['company']['catchPhrase'].', '. $data['company']['bs']}}</p>
                                <hr>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Phone</th>
                                            <th>Website</th>
                                            <th>Geo Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$data['email']}}</td>
                                            <td>{{$data['username']}}</td>
                                            <td>{{$data['phone']}}</td>
                                            <td>{{$data['website']}}</td>
                                            <td>{{$data['address']['geo']['lat'].', '.$data['address']['geo']['lng']}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <a href="{{ url('users') }}" class="back-to-list"><button type="button" class="btn btn-primary">Back To List</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>