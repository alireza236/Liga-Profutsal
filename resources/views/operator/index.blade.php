@extends('layout.template')
    @section('main')
    <div class="row">
        <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Column sizing</span>
                </div>
                <div class="panel-body">
                     <p>Welcome {{ Auth::user()->name }}</p>
                     <p>Hayy</p>
                </div>
        </div>
    </div>
@endsection