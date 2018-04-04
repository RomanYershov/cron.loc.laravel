@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form action="/create" method="post">
                            {{csrf_field()}}
                            Tittle:<input type="text" name="title">
                            <textarea name="text" id="" cols="30" rows="10"></textarea>
                            <input type="submit" value="Add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
