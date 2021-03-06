@extends('layouts.app')

@section('head')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection
@section('navigation')
    @parent
@endsection
@section('content')
    @include('layouts.dashboard_nav')

            <div class="row">
                <div class="col">
                    <div class="table-responsive d-none d-md-block">
                        <div class="row spacer-100"></div>
                        <h4>Best Weight</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">TRAINING</th>
                                <th scope="col" class="text-center">WORKOUT</th>
                                <th scope="col" class="text-center">DATE CREATED</th>
                                <th scope="col" class="text-center">DURATION</th>
                                <th scope="col" class="text-center">REST</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                                <th scope="col" class="text-center">REPETITIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($best_weight as $workout)
                                <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                    {{--<th class="text-center">{{ $workout['training'] }}</th>--}}
                                    {{--<th class="text-center">{{ str_replace('_', ' ', $workout['type']) }}</th>--}}
                                    {{--<td class="text-center">{{ date('d/m/Y', strtotime($workout['created_at'])) }}</td>--}}
                                    {{--<td class="text-center">{{ $workout['duration'] }}</td>--}}
                                    {{--<td class="text-center">{{ $workout['rest'] }}</td>--}}
                                    {{--<td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>--}}
                                    {{--<td class="text-center">{{ $workout['repetitions'] }}</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive d-sm-none">
                        <div class="row spacer-50"></div>
                        <h4>Best Weight</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col">WORKOUT</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($best_weight as $workout)
                                <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                    <th scope="row">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                    <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive d-none d-md-block">
                        <div class="spacer-20"></div>
                        <h4>Best Time</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">TRAINING</th>
                                <th scope="col" class="text-center">WORKOUT</th>
                                <th scope="col" class="text-center">DATE CREATED</th>
                                <th scope="col" class="text-center">DURATION</th>
                                <th scope="col" class="text-center">REST</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                                <th scope="col" class="text-center">REPETITIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($best_time as $workout)
                                <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                    <th scope="row" class="text-center">{{ $workout['training'] }}</th>
                                    <th class="text-center">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                    <td class="text-center">{{ date('d/m/Y', strtotime($workout['created_at'])) }}</td>
                                    <td class="text-center">{{ $workout['duration'] }}</td>
                                    <td class="text-center">{{ $workout['rest'] }}</td>
                                    <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                    <td class="text-center">{{ $workout['repetitions'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive d-sm-none">
                        <div class="spacer-20"></div>
                        <h4>Best Time</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col">WORKOUT</th>
                                <th scope="col" class="text-center">DURATION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($best_time as $workout)
                                <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                    <th scope="row">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                    <td class="text-center">{{ $workout['duration'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive d-none d-sm-block">
                        <div class="row spacer-100"></div>
                        <h4>Latest Results</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">TRAINING</th>
                                <th scope="col" class="text-center">WORKOUT</th>
                                <th scope="col" class="text-center">DATE CREATED</th>
                                <th scope="col" class="text-center">DURATION</th>
                                <th scope="col" class="text-center">REST</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                                <th scope="col" class="text-center">REPETITIONS</th>
                            </tr>
                            <thead>
                            <tbody>
                            @foreach($workouts as $workout)
                                @if($workout['user_id'] == $params['user']->id)
                                    <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                        <th scope="row" class="text-center">{{ str_replace('_', ' ', $workout['training']) }}</th>
                                        <th class="text-center">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($workout['created_at'])) }}</td>
                                        <td class="text-center">{{ $workout['duration'] }}</td>
                                        <td class="text-center">{{ $workout['rest'] }}</td>
                                        <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                        <td class="text-center">{{ $workout['repetitions'] }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive d-md-none">
                        <div class="row spacer-50"></div>
                        <h4>Latest Results</h4>
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th scope="col">WORKOUT</th>
                                <th scope="col" class="text-center">WEIGHT</th>
                                <th scope="col" class="text-center">REPETITIONS</th>
                            </tr>
                            <thead>
                            <tbody>
                            @foreach($workouts as $workout)
                                @if($workout['user_id'] == $params['user']->id)
                                    <tr class="clickable-row" data-href="/workout/detail/{{ $workout['id'] }}" data-toggle="tooltip" data-placement="top" title="click to view">
                                        <th scope="row">{{ str_replace('_', ' ', $workout['type']) }}</th>
                                        <td class="text-center">{{ $workout['weight'] }} {{ $workout['weight_unit'] }}</td>
                                        <td class="text-center">{{ $workout['repetitions'] }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        <div class="spacer-100"></div>
    </div>
@endsection
@section('footer')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">dashboard</li>
            <li class="breadcrumb-item"><a href="{{ url('fitness') }}">workout</a></li>
            <li class="breadcrumb-item"><a href="{{ url('nutrition') }}">nutrition</a></li>
            <li class="breadcrumb-item"><a href="{{ url('health') }}">health</a></li>
        </ol>
    </nav>
    <script src="{{ asset('js/dashboard_charts.js') }}"></script>
@endsection