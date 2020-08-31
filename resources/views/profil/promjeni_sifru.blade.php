
@extends('profil.okvir')

@section('sadrzaj')
    <div class="col-md-8 offset-2">

        <div class="card">
            <div class="card-body">

                <div class="col-md-8">
                    <h3 style="margin-top: 5px;">Promjeni šifru</h3>
                </div>
                <div  style="text-align: right;">
                    <a href="{{ route('kolegiji.pogled') }}" class="btn btn-danger">Vrati se</a>
                </div>

            </div>
        </div>

        <br/>

        <div class="card">
            <div class="card-body">

                <div class="col-md-8">

                    <form id="form-change-password" role="form" method="POST" action="{{ route('profil.promjeni_sifru') }}" >
             
                        <div class="form-group">
                            <label for="current-password" class="control-label">Trenutna šifra</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Trenutna šifra">

                        </div>
                
                        <div class="form-group">
                            <label for="password" class="control-label">Nova šifra</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nova šifra">

                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="control-label">Potvrdi novu šifru</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Potvrdi novu šifru">
                            
                        </div>

                        <button type="submit" class="btn btn-primary" style="float:right" >Spremi</button>
    
                    </form>
                
                </div>
            </div>
        </div>
    </div>

@endsection




















