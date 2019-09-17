@extends('layout.template')
    @section('main')
    <div class="row">
        <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Column sizing</span>
                </div>
                <div class="panel-body">
                      <p>Hallo {{ Auth::user()->name }}</p>
                </div>
        </div>
    </div>
@endsection