@extends('layout.template')
@section('main')
<div class="row">
    <div class="col-sm-12">
        <form class="panel form-horizontal" action="{{ url('player/store') }}" method="POST">
                @csrf
            <div class="panel-heading">
                <span class="panel-title">Form example</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nama:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div> <!-- / .form-group -->
                <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Alamat:</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" id="alamat" placeholder="Alamat">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div> <!-- / .form-group -->
                <div class="form-group">
                    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir:</label>
                    <div class="col-sm-10">
                        <input type="text" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div> <!-- / .form-group -->
                <div class="form-group">
                        <label for="tinggi_bdn" class="col-sm-2 control-label">Tinggi Badan:</label>
                        <div class="col-sm-10">
                            <select id="jquery-select2-example" name="tinggi_bdn" class="form-control">
                            @for ($i = 149; $i <= 180; $i++)
                                    <option></option> 
                                    <option value="{{$i}}">{{ $i }} cm</option>
                            @endfor
                            </select>
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                </div>
                <div class="form-group">
                        <label for="berat_bdn" class="col-sm-2 control-label">Berat Badan:</label>
                        <div class="col-sm-10">
                            <select id="jquery-select2-example" name="berat_bdn" class="form-control">
                            @for ($i = 50; $i <= 80; $i++)
                                    <option></option> 
                                    <option value="{{$i}}">{{ $i }} kg</option>
                            @endfor
                            </select>
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="assuransi" class="col-sm-2 control-label">Assuransi yang digunakan:</label>
                        <div class="col-sm-10">
                            <input type="text" name="assuransi" class="form-control" id="assuransi" placeholder="Assuransi">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div>  
                    <div class="form-group">
                            <label for="assuransi" class="col-sm-2 control-label">Foto:</label>
                            <div class="col-sm-10">
                                    <input type="file" id="styled-finputs-example">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                    </div>  
                <div class="form-group" style="margin-bottom: 0;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>  
            </div>
        </form>
    </div>
@endsection