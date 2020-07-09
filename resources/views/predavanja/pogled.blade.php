@extends('profil.okvir')



@section('sadrzaj')

        <div class="col-md-10 offset-1">
            <div class="row">
                <div class="col-md-8">
                    <h1>Predavanja</h1>
                </div>

                @if (Auth::user()->type=='profesor')
                    <div style="text-align: right;">
                        <a href="{{ route('predavanja.dodaj', request()->id) }}" class="btn btn-primary">Novo Predavanje</a>
                    </div>
                @endif
            </div>

    <br>

            <table class="table table-bordered">
                <tr>
                    <th>Naziv</th>
                    <th>Opis</th>
                    <th>Vrijeme</th>
                    @if (Auth::user()->type=='profesor')
                        <th>Akcije</th>
                    @endif
                </tr>

                @foreach($predavanja as $predavanje)

                    <tr>
                        <td> <a href="{{route('dolasci.pogled_prof', $predavanje->id)}}"> {{ $predavanje->naziv }} </a></td>
                        <td>{{ $predavanje->opis}}</td>
                        <td>{{ $predavanje->vrijeme }}</td>

                        @if (Auth::user()->type=='profesor')
                            <td>
                                <a href="{{ route('predavanja.uredi', $predavanje->id) }}">Uredi</a>
                                |
                                <a href="{{ route('predavanja.izbrisi', $predavanje->id) }}">Izbriši</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>


        </div>



@endsection
