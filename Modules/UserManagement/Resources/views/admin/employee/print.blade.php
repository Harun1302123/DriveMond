<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ translate('Employee_List') }}</title>
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


    <div class="row mb-4">
        <h4 class="col-12 fw-medium text-primary mb-2">Employee List</h4>
    </div>

    <table class="table table-borderless table-striped">
        <thead>
        <tr>
            <th class="text-uppercase text-primary">{{translate('SL')}}</th>
            <th class="text-uppercase text-primary">{{translate('name')}}</th>
            <th class="text-uppercase text-primary">{{translate('email')}}</th>
            <th class="text-uppercase text-primary">{{translate('phone')}}</th>
            <th class="text-uppercase text-primary">{{translate('id_number')}}</th>
            <th class="text-uppercase text-primary">{{translate('id_type')}}</th>
            <th class="text-uppercase text-primary">{{translate('user_type')}}</th>
            <th class="text-uppercase text-primary">{{translate('role')}}</th>
            <th class="text-uppercase text-primary">{{translate('modules')}}</th>
            <th class="text-uppercase text-primary">{{translate('status')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $d)
            <tr>
                <td class="word-break">{{++$key}}</td>
                <td class="word-break">{{$d['name']}}</td>
                <td class="word-break">{{$d['email']}}</td>
                <td class="word-break">{{$d['phone']}}</td>
                <td class="word-break">{{$d['identification_number']}}</td>
                <td class="word-break">{{$d['identification_type']}}</td>
                <td class="word-break">{{$d['user_type']}}</td>
                <td class="word-break">{{$d['role']}}</td>
                <td class="word-break">
                    @forelse(json_decode($d['modules']) as $module)
                        {{$module}},
                    @empty
                    @endforelse
                </td>
                <td class="word-break">{{$d['status']}}</td>
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
    "use strict"
    window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();

</script>
