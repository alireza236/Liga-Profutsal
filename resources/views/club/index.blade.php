@extends('layout.template')
    @section('main')
   
    <div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<span class="panel-title">Default tables</span>
					</div>
					<div class="panel-body">
                        @if (count($clubs) > 0)
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Club Name</th>
									<th>Email</th>
									<th>Address</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
                                @foreach ($clubs as $club)
                                <tr>
                                    <td>{{ $club->id }}</td>
                                    <td>{{ $club->name }}</td>
                                    <td>{{ $club->email }}</td>
                                    <td>{{ !empty($club->address) ? $club->address : '-' }}</td>
                                    <td></td>
								</tr>
                                @endforeach
							</tbody>
                        </table>
                        @else
                            <p>Data club tidak ada</p>     
                        @endif
					</div>
				</div>
			</div>
		</div>
@endsection