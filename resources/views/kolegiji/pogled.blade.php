@extends('profil.okvir')



@section('sadrzaj')

    <div class="row">
        <div class="col-4">
            <div class="card" style="width:300px">
                <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSEZlC24s3L3k0N1c5ecNr3raPU8lThTBqu83Av_byYL004oHiY&usqp=CAU" style="width:100%" height="250px">
                <div class="card-body">
                    <h4 class="card-title">{{ Auth::user()->name }}</h4>
                    <p class="card-text">{{ Auth::user()->email }}</p><br>
                    <a href="{{ route('profil.promjeni_sifru') }}" class="btn btn-primary" style="float: right;" >Promjeni šifru</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <h1>Kolegiji</h1>
                </div>

                @if (Auth::user()->type=='profesor')
                    <div style="text-align: right;">
                        <a href="{{ route('kolegiji.dodaj') }}" class="btn btn-primary">Novi Kolegiji</a>
                    </div>
                @endif

            </div>

            <br>

            <table class="table table-bordered">
                <tr>
                    <th>Naziv</th>
                    <th>Opis</th>
                    @if (Auth::user()->type=='profesor')
                        <th>Akcije</th>
                    @endif
                </tr>

                @foreach(Auth::user()->kolegiji as $kolegij)
                    <tr>
                        @if (Auth::user()->type=='profesor')
                                <td><a href="{{route('predavanja.pogled', $kolegij->id)}}">{{ $kolegij->naziv}} </a></td>
                            @endif
                            @if (Auth::user()->type=='ucenik')
                                <td><a href="{{route('dolasci.pogled_ucenik', $kolegij->id)}}">{{ $kolegij->naziv}} </a></td>
                            @endif

                        <td>{{ $kolegij->opis}}</td>

                        @if (Auth::user()->type=='profesor')
                            <td>
                                <a href="{{ route('kolegiji.uredi', $kolegij->id) }}">Uredi</a>
                                |
                                <a href="{{ route('kolegiji.izbrisi', $kolegij->id) }}">Izbriši</a>

                                <a href="{{ route('studenti.prikazi', $kolegij->id) }}" class="btn btn-primary" style="float:right;">Dodaj studente</a>
                            </td>
                        @endif

                    </tr>
                @endforeach
            </table>


        </div>
    </div>
@endsection
