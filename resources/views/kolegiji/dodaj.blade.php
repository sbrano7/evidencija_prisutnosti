@extends('profil.okvir')

@section('sadrzaj')

    <div class="col-md-8 offset-2"  >

        <div class="card">
            <div class="card-body">

                <div class="col-md-8">
                    <h3 style="margin-top: 5px;">Novi Kolegij</h3>
                </div>
                <div  style="text-align: right;">
                    <a href="{{ route('kolegiji.pogled') }}" class="btn btn-danger">Vrati se</a>
                </div>

            </div>
        </div>

        <br/>

        <div class="card">
            <div class="card-body">

                <div class="col-md-8 offset-2" >

                    <form id='spremi' action="{{ route('kolegiji.spremi') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="naziv">Naziv *</label>
                            <input name="naziv" type="text" class="form-control" placeholder="Unesi naziv.. *">
                        </div>

                        <div class="form-group">
                            <label for="naziv">Opis *</label>
                            <textarea class="form-control" name="opis" rows="5" placeholder="Unesi opis.."></textarea>
                        </div>
                        <button type="button" onclick="myF()" class="btn btn-primary" >Spremi</button>
                        
                    </form>

                   <p style="color: red;"> @error('naziv') {{$message}}@enderror</p>

                    <script>
								function myF(){
									var r = confirm("Da li ste sigurni da želite dodati novi kolegij?");
  									if (r == true) {
										document.getElementById('spremi').submit();
									    }
								    }
						</script>
                </div>
            </div>
        </div>
    </div>


@endsection
