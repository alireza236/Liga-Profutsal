@extends('layout.template')
@section('main')
    <div class="row">
            <div class="panel">
					<div class="panel-heading">
						<span class="panel-title"><a href="{{ url('player/create') }}" class="btn btn-primary">Tambah Pemain</a></span>
					</div>
					<div class="panel-body">
                        @if (count($players) > 0)
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Umur</th>
									<th>Address</th>
									<th>Tinggi Badan</th>
									<th>Berat Badan</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($players as $player)
                                <tr>
                                    <td>{{ $player->id }}</td>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->umur }}</td>
                                    <td>{{ $player->address }}</td>
                                    <td>{{ $player->tinggi_bdn }}</td>
                                    <td>{{ $player->berat_bdn }}</td>
                                    <td></td>
								</tr>
                                @endforeach
							</tbody>
                        </table>
                        @else
                            <p>Data Pemain tidak ada</p>     
                        @endif
					</div>
			</div>
    </div>
@endsection
 