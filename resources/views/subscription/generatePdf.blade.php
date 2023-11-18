<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        body {
    margin-top: 20px;
}
    </style>
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <!-- Header Section -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <address>
                            <strong>National Publication Limited</strong>
                            <br>
                            Blantyre
                            <br>
                            Muwemi
                            <br>
                            <abbr title="Phone">P:</abbr> (213) 484-6829
                        </address>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <p>
                            <em>Date: {{ $sessionData['startDate']->toFormattedDateString() }}</em>
                        </p>

                    </div>
                </div>
                <!-- Billed To Section -->
                <div>
                    <h6>Billed To</h6>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <address>
                            <strong>{{ $sessionData['user']->name }}</strong>
                            <br>
                            {{ $sessionData['user']->location }}
                            <br>
                            {{ $sessionData['user']->region }}
                            <br>
                            <abbr title="Phone">P:</abbr> {{ $sessionData['user']->phone }}
                        </address>
                    </div>
                </div>

                <!-- Receipt Title -->
                <div class="row">
                    <div class="text-center">
                        <h1>Receipt</h1>
                    </div>
                </div>

                <!-- Subscription Details -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        Subscription Period: {{$sessionData['duration'] }} Months
                    </div>
                </div>

                <!-- Publications Table -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Publication</th>
                            <th class="text-center"> Copies</th>
                            <th class="text-center">Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                              $total_price= 0 ;
                            ?>
                        @foreach($SessionData['publications'] as $publication)
                            <tr>
                                <td class="col-md-9"><em>{{ $publication['publication_name'] }}</em></td>
                                <td class="col-md-1" style="text-align: center">{{ $publication['copies'] }}</td>
                                <td class="col-md-1 text-center">MWK{{ $publication['price']  *   $publication['copies']}} </td>
                                 <?php
                                      $total_price += $publication['price'] * $publication['copies'];
                                 ?>
                            </tr>
                        @endforeach
                        <!-- Subtotal and Total Section -->
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                                <p><strong>Subtotal: </strong></p>
                                <p><strong>Tax: </strong></p>
                            </td>
                            <td class="text-center">
                                <p><strong>MWK{{ $total_price }}</strong></p>

                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>MWK{{ $total_price }}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pay Now Button -->
                <button type="button" class="btn btn-success btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
            </div>
        </div>
    </div>

</body>
</html>
