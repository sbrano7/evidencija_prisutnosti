@extends('profil.okvir')

@section('sadrzaj')

<div class="col-md-8 offset-2"  >

<div class="card">
            <div class="card-body">

                <div class="col-md-8">
                    <h3 style="margin-top: 5px;">Dodaj studente</h3>
                </div>
                <div  style="text-align: right;">
                    <a href="{{ route('kolegiji.pogled') }}" class="btn btn-danger">Vrati se</a>
                </div>

            </div>
        </div>



<br/>


<div class="col-md-8 offset-2">

	<form action="{{ route('studenti.dodaj',request()->id ) }}" method="POST" role="search">
			{{ csrf_field() }}
			<div class="input-group">
				<input type="text" class="form-control" name="q" placeholder="Pretraži studente"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
                      <span class="fas fa-search"></span>
					</button>
				</span>
			</div>
		</form>
 </div>

 <br/>

 <div class="container">
			@if(isset($details))
			<p> Rezultat za pretraživanje <b> {{ $query }} </b> je :</p>
			<h2>Studenti:</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Ime Prezime</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $user)
					@if ($user->type=='ucenik')
					<tr>
                    
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>

                        <td> 					
						<form action="{{ route('userkolegij.create') }}" method="POST">
                   			 @csrf
                            <input name="user_id" type="hidden" class="form-control" value="{{$user->id}}">
                            <input name="kolegij_id" type="hidden" class="form-control" value="{{request()->id}}">


                            <a href="{{ route('userkolegij.create') }}"><button  class="btn btn-primary">Dodaj</button></a>
    
                		</form> 
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>



@endsection
