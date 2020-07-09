@extends('profil.okvir')



@section('sadrzaj')

    <div class="col-md-10 offset-1">
        <div class="row">
            <div class="col-md-8">
                <h1>Prisutnost</h1>
            </div>

        </div>

        <br>

        <table class="table table-bordered">
            <tr>
                <th>Student</th>
                <th>Prisutan (DA/NE)</th>
                <th>Akcije</th>

            </tr>

            @foreach($users as $user)

                <tr>
                    <td>{{ $user->user_id}}</td>
                    <td></td>
                    <td></td>
                </tr>

            @endforeach





        </table>


    </div>



@endsection
