@extends('projects.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header d-flex justify-content-center">Popis projekata</h2>
                <div class="card-body">
                    <a href="{{ url('/projects/create') }}" class="btn btn-primary btn-sm mb-4"
                        title="Dodaj novi projekt"> Dodaj novi projekt
                    </a>
                    <div class="table-responsive">
                        <h4>Projekti na kojima je korisnik voditelj:</h4>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Naziv projekta</th>
                                    <th>Opis projekta</th>
                                    <th>Cijena projekta</th>
                                    <th>Obavljeni zadaci</th>
                                    <th>Datum početka</th>
                                    <th>Datum završetka</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $project->naziv_projekta }}</td>
                                    <td>{{ $project->opis_projekta }}</td>
                                    <td>{{ $project->cijena_projekta }}</td>
                                    <td>{{ $project->obavljeni_poslovi }}</td>
                                    <td>{{ $project->datum_pocetka }}</td>
                                    <td>{{ $project->datum_zavrsetka }}</td>
                                    <td>
                                        <a href="{{ url('/projects/' . $project->id . '/edit') }}"
                                            title="Uredi projekt"><button
                                                class="btn btn-primary btn-sm">Uredi</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <h4>Projekti na kojima je korisnik dodan kao član tima:</h4>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Naziv projekta</th>
                                    <th>Opis projekta</th>
                                    <th>Cijena projekta</th>
                                    <th>Obavljeni zadaci</th>
                                    <th>Datum početka</th>
                                    <th>Datum završetka</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects_member as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->naziv_projekta }}</td>
                                    <td>{{ $member->opis_projekta }}</td>
                                    <td>{{ $member->cijena_projekta }}</td>
                                    <td>{{ $member->obavljeni_poslovi }}</td>
                                    <td>{{ $member->datum_pocetka }}</td>
                                    <td>{{ $member->datum_zavrsetka }}</td>
                                    <td>
                                        <a href="{{ url('/projects/' . $member->id . '/edit') }}"
                                            title="Uredi projekt"><button
                                                class="btn btn-primary btn-sm">Uredi</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
