@extends('profil.okvir')



@section('sadrzaj')

    <div class="col-md-10 offset-1">
        <div class="row">
            <div class="col-md-12">
                <p> <a href="{{ route('kolegiji.pogled') }}" >Početna</a> ->  <a href="{{ route('predavanja.pogled',$predavanje->kolegij->id)}}">{{$predavanje->kolegij->naziv}}</a> -> {{$predavanje->naziv}} </p>
                <h2>Prisutnost:</h2>
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
                <form action="{{ route('dolasci.modify') }}" method="POST">
                    @csrf
                    @if ($dolazak->user->type=='ucenik')
                    <tr>
                        <td>{{$dolazak->user->name}}</td>
                        <td>
                            <input name="user_id" type="hidden" class="form-control" value="{{$dolazak->user->id}}">
                            <input name="predavanje_id" type="hidden" class="form-control" value="{{$dolazak->predavanje->id}}">
                            <input name="id" type="hidden" class="form-control" value="{{$dolazak->id}}">

                                <select  id="inputState" name='prisutan' class="form-control">
                                    <option value="0" {{ ( $dolazak->prisutan == 0) ? 'selected' : '' }}>Ne</option>
                                    <option value="1" {{ ( $dolazak->prisutan == 1) ? 'selected' : '' }}>Da</option>
                                </select>

                        </td>

                        <td>
                            <a href="{{ route('dolasci.modify') }}"><button  class="btn btn-primary">Spremi</button></a>
                        </td>
                    </tr>
                    @endif
                </form>
            @endforeach





        </table>


    </div>



@endsection
