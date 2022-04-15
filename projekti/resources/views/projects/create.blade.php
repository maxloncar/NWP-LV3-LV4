@extends('projects.layout')
@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header d-flex justify-content-center">Dodaj novi projekt</h2>
                <div class="card-body">
                    <form action="{{ url('projects') }}" method="post">
                        {!! csrf_field() !!}
                        <label>Naziv projekta</label>
                        <input type="text" name="naziv_projekta" id="naziv_projekta" class="form-control mb-3">
                        <label>Opis projekta</label>
                        <input type="text" name="opis_projekta" id="opis_projekta" class="form-control mb-3">
                        <label>Cijena projekta</label>
                        <input type="text" name="cijena_projekta" id="cijena_projekta" class="form-control mb-3">
                        <label>Obavljeni poslovi</label>
                        <input type="text" name="obavljeni_poslovi" id="obavljeni_poslovi" class="form-control mb-3">
                        <label>Datum početka</label>
                        <input type="date" name="datum_pocetka" id="datum_pocetka" class="form-control mb-3">
                        <label>Datum završetka</label>
                        <input type="date" name="datum_zavrsetka" id="datum_zavrsetka" class="form-control mb-3">
                        <h4 id="selected_members">Odaberi članove projektnog tima: </h4>
                        <fieldset class="checkboxes">
                            @foreach ($users as $user)
                            <p>
                                {{ $user->name }}<input type="checkbox" name="team_members[]" value={{ $user->id }}
                                    class='member_checkbox ml-1'>
                            </p>
                            @endforeach
                        </fieldset>

                        <input type="submit" value="Spremi promjene" class="btn btn-primary btn-block mb-3 mt-3">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
