@extends('layouts.app')

@section('head')
    @parent
        <title>{{ config('app.name', 'The Fittest Warrior') }} | Home</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    @include('layouts.dashboard_nav')
    <div id="health">
        @if(!empty(Session::has('alert')))
            @switch(Session::get('alert'))
                @case('success')
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @break

                @case('warning')
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @break

                @default
                <div class="row">
                    <div class="col">
                        <div class="alert alert-secondary" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            @endswitch
        @endif
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">health</li>
                <li class="breadcrumb-item"><a href="{{ url('form/health') }}">add</a></li>
            </ol>
        </nav>
        <a href="{{ url('form/health') }}" class="btn btn-warning" role="button" style="float: right;">add health record</a>
        <div class="spacer-50" style="border-bottom: 1px solid black"></div>
        <div class="spacer-20"></div>
        @if(empty($health_collection))
            <h2 style="width: 90%;">Welcome to your heath tracker, there are no records to display.</h2>
            <span class="spacer-50"></span>
            <h5 style="width: 80%">This is not a reflection on you, this just means that we do not have any stored records. If you want to store some health records please start by clicking add health record button.
            </h5>
            <div class="spacer-50"></div>
        @else
            @foreach($health_collection as $health)
                @if($health->status === 'active')
                    <div class="col">
                        <div class="row">
                            <div class="table-responsive d-block">
                                <h4>Health Record</h4>
                                <hr>
                                <a href="{{ url('form/health') }}/{{ $health->id }}" class="btn btn-warning" role="button" style="float: right; margin: 0 10px 15px;">edit</a>
                                <a href="{{ url('form/health') }}/{{ $health->id }}/change_status" class="btn btn-warning" role="button" style="float: right; margin: 0 10px 15px;" >delete</a>

                                <form id="delete-form" action="{{ url('health/delete') }}/{{ $health->id }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <div class="spacer-20"></div>
                                <table class="table table-sm">
                                    <thead>
                                    <th class="text-center">Start Date Time</th>
                                    <th class="text-center">End Date Time</th>
                                    <th class="text-center">Status</th>
                                    </thead>
                                    <tbody>
                                    <th scope="row" class="text-center">{{ date('m/d/Y H:i:s', strtotime($health->start_date_time)) }}</th>
                                    <th scope="row" class="text-center">{{ date('m/d/Y H:i:s', strtotime($health->end_date_time)) }}</th>
                                    <th scope="row" class="text-center">average/age - calculated</th>
                                    <tr>
                                        <td class="text-center">LDL Cholesterol</td>
                                        <td class="text-center">{{ $health->ldl_cholesterol }}</td>
                                        <td class="text-center">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Fat Percentage</td>
                                        <td class="text-center">{{ $health->fat_percentage }}</td>
                                        <td class="text-center">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25% low</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Systolic Blood Pressure</td>
                                        <td class="text-center">{{ $health->systolic_blood_pressure }}</td>
                                        <td class="text-center">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60% mid</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Systolic Blood Pressure</td>
                                        <td class="text-center">{{ $health->diastolic_blood_pressure }}</td>
                                        <td class="text-center">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80% high</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">HDL Cholesterol</td>
                                        <td class="text-center">{{ $health->hdl_cholesterol }}</td>
                                        <td class="text-center">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90% very high</div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="spacer-50"></div>
                @endif
            @endforeach
        @endif
    </div>
@endsection
@section('footer')
    @parent
@endsection