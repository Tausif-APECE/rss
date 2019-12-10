@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">Word Count List</div>

                    <div class="panel-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Word</th>
                                <th>Count</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($finalResult))
                                <?php $i = 0;?>
                                @foreach($finalResult as $key => $value)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{ !empty($key) ? $key : '' }}</td>
                                        <td>{{ !empty($value) ? $value : 0 }}</td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection