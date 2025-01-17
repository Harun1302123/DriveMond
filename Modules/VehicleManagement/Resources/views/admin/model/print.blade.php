<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/admin-module/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module/css/style.css')}}"/>
    <style>
        .invoice-container {
            background-color: var(--bs-white);
            padding: 2.5rem 1.875rem;
            margin: 0.5rem auto;
            max-inline-size: 43.75rem;
        }
    </style>
</head>

<body>
<div class="container" id="printableTable">

    <div class="border-bottom border-primary pb-4 mb-4">

    </div>

    <div class="row mb-4">
        <h4 class="col-12 fw-medium text-primary mb-2">{{ translate('model_List') }}</h4>
    </div>

    <table class="table table-borderless table-striped">
        <thead>
        <tr>
            <th class="text-uppercase text-primary">{{translate('SL')}}</th>
            <th class="text-uppercase text-primary">{{translate('id')}}</th>
            <th class="text-uppercase text-primary">{{translate('model_name')}}</th>
            <th class="text-uppercase text-primary">{{translate('description')}}</th>
            <th class="text-uppercase text-primary">{{translate('brand_id')}}</th>
            <th class="text-uppercase text-primary">{{translate('seat_capacity')}}</th>
            <th class="text-uppercase text-primary">{{translate('maximum_weight')}}</th>
            <th class="text-uppercase text-primary">{{translate('hatch_bag_capacity')}}</th>
            <th class="text-uppercase text-primary">{{translate('engine')}}</th>
            <th class="text-uppercase text-primary">{{translate('total_vehicles')}}</th>
            <th class="text-uppercase text-primary">{{translate('active')}}</th>
            <th class="text-uppercase text-primary">{{translate('created_at')}}</th>
        </tr>
        </thead>
        <tbody>
        @php($time_format = getSession('time_format'))
        @foreach($data as $key => $d)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$d['id']}}</td>
                <td>{{$d['name']}}</td>
                <td>{{$d['description']}}</td>
                <td>{{$d['brand_id']}}</td>
                <td>{{$d['seat_capacity']}}</td>
                <td>{{$d['maximum_weight']}}</td>
                <td>{{$d['hatch_bag_capacity']}}</td>
                <td>{{$d['engine']}}</td>
                <td>{{$d['total_vehicles']}}</td>
                <td>{{$d['is_active'] ? 'active' : 'inactive'}}</td>
                <td>{{date(DATE_FORMAT,strtotime($d['created_at']))}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <p>{{translate('note:_this_is_software_generated_copy')}}</p>
</div>

<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>

</body>

</html>

<script>
    "use strict";
    window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();

</script>
