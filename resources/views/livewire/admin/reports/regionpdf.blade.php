<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

</style>
</head>
<body>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <?php $id = 1; ?>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            ID
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            NAME
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            LOCATION
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            REGION
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            TOTAL COPIES
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            TOTAL PRICE
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            DAYS REMAINING
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            STATUS
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('subscriptionData', []) as $subscription)
                        @php
                            $user = \App\Models\User::find($subscription['user_id']); // Use the correct namespace for your User model
                        @endphp

                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    {{ $id++ }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    {{ $subscription['location'] }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    {{ $subscription['region'] }}
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    {{ $subscription['total_copies'] }}
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                                {{ $subscription['total_price'] }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $subscription['remaining_days'] }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $subscription['status'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</body>
</html>




