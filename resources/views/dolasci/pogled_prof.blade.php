@extends('profil.okvir')



@section('sadrzaj')

    <div class="col-md-10 offset-1">
        <div class="row">
            <div class="col-md-12">
                <p> {{$predavanje->kolegij->naziv}} -> {{$predavanje->naziv}} -> Prisutnost</p>
                <h1>Prisutnost</h1>
            </div>

        </div>

        <br>

        <table class="table table-bordered">
            <tr>
                <th>Student</th>
                <th>Prisutan (Da/Ne)</th>
                <th>Akcije</th>

            </tr>

            @foreach($dolasci as $dolazak)
                <form action="{{ route('predavanja.spremi') }}" method="POST">
                    @csrf
                    <tr>
                        <td>{{$dolazak->user->name}}</td>
                        <td>
                                <select id="inputState" class="form-control">
                                    <option value="0" {{ ( $dolazak->prisutan == 0) ? 'selected' : '' }}>Ne</option>
                                    <option value="1" {{ ( $dolazak->prisutan == 1) ? 'selected' : '' }}>Da</option>
                                </select>

                        </td>
                        <td><button type="submit" class="btn btn-primary">Spremi</button></td>
                    </tr>
                </form>
            @endforeach





        </table>


    </div>



@endsection
