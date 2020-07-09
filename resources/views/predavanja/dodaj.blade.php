@extends('profil.okvir')

@section('sadrzaj')


            <div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-body">

                            <div class="col-md-8">
                                <h3 style="margin-top: 5px;">Novo predavanje</h3>
                            </div>
                            <div  style="text-align: right;">
                                <a href="{{ route('predavanja.pogled',request()->id)}}" class="btn btn-danger">Vrati se</a>
                            </div>

                    </div>
                </div>

                <br/>



                <div class="card">
                    <div class="card-body">

                        <div class="col-md-8 offset-2">

                            <form action="{{ route('predavanja.spremi') }}" method="POST">
                            @csrf
                                <input name="id" type="hidden" class="form-control" value="{{request()->id}}">
                                <div class="form-group">
                                    <label for="naziv">Naziv *</label>
                                    <input name="naziv" type="text" class="form-control" placeholder="Unesi naziv.. *">
                                </div>

                                <div class="form-group">
                                    <label for="naziv">Opis *</label>
                                    <textarea class="form-control" name="opis" rows="5" placeholder="Unesi opis.."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="vrijeme">Vrijeme *</label>
                                    <input name="vrijeme" type="date" class="form-control" placeholder="Unesi vrijeme.. *" >
                                </div>

                                <button type="submit" class="btn btn-primary">Spremi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


@endsection
