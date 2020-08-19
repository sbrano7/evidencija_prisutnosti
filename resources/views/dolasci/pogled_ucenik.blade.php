@extends('profil.okvir')



@section('sadrzaj')
<h2>Prisutnost:</h2>
<table class="table table-striped">
				<thead>
					<tr>
						<th>Predavanje</th>
                        <th>Vrijeme održavanja</th>
						<th>Prisutan(Da/Ne)</th>
					</tr>
				</thead>
				<tbody>
					@foreach($dolasci as $dolazak)
                    @if ($dolazak->predavanje->kolegij_id==request()->id)
					<tr>
                    
						<td>{{$dolazak->predavanje->naziv}}</td>
                        <td>{{$dolazak->predavanje->vrijeme}}</td>
						<td>
                        @if($dolazak->prisutan==1)Da
                        @else($dolazak->prisutan==1)Ne
                        @endif
                        </td>

					</tr>
    @endif
					@endforeach
				</tbody>
			</table>

@endsection
