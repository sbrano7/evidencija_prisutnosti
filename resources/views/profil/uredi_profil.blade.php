


@extends('profil.okvir')

@section('sadrzaj')
    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <div class="col-md-8">
                    <h3 style="margin-top: 5px;">Uredi profil</h3>
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

                    <form action="{{ route('profil.uredi_profil', Auth::user()->id) }}" method="POST">
                    @csrf

                        <div class="form-group">
                            <label for="name">Naziv *</label>
                            <input name="name" type="text" class="form-control" placeholder="Unesi naziv.. *"
                                   value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input name="email" type="text" class="form-control" placeholder="Unesi email.. *"
                                   value="{{ $user->email }}">
                        </div>


                        <button type="submit" class="btn btn-primary">Spremi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection




















