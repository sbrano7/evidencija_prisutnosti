@extends('profil.okvir')



@section('sadrzaj')

    <div class="col-md-10 offset-1">
        <div class="row">
            <div class="col-md-8">
                <h1>Prisutnost</h1>
            </div>

        <br>

        <table class="table table-bordered">
            <tr>
                <th>Predavanje</th>
                <th>Prisutnost</th>
                <th>Vrijeme predavanja</th>
            </tr>

            @foreach($predavanja as $predavanje)

                <tr>
                    <td>{{ $predavanje->naziv }}</td>
                    <td>  </td>
                    <td>{{ $predavanje->vrijeme }}</td>
                </tr>
            @endforeach
        </table>


    </div>



@endsection
