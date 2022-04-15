@extends('projects.layout')
@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header d-flex justify-content-center">Uredi projekt</h2>
                <div class="card-body">
                    <form action="{{ url('projects/' .$projects->id) }}" method="post">
                        {!! csrf_field() !!}
                        @method("PATCH")
                        <label>Naziv projekta</label></br>
                        <input type="text" name="naziv_projekta" id="naziv_projekta"
                            value="{{$projects->naziv_projekta}}" class="form-control"></br>
                        <label>Opis projekta</label></br>
                        <input type="text" name="opis_projekta" id="opis_projekta" value="{{$projects->opis_projekta}}"
                            class="form-control"></br>
                        <label>Cijena projekta</label></br>
                        <input type="text" name="cijena_projekta" id="cijena_projekta"
                            value="{{$projects->cijena_projekta}}" class="form-control"></br>
                        <label>Obavljeni poslovi</label></br>
                        <input type="text" name="obavljeni_poslovi" id="obavljeni_poslovi"
                            value="{{$projects->obavljeni_poslovi}}" class="form-control"></br>
                        <label>Datum početka</label>
                        <input type="date" name="datum_pocetka" id="datum_pocetka" value="{{$projects->datum_pocetka}}"
                            class="form-control"></br>
                        <label>Datum završetka</label>
                        <input type="date" name="datum_zavrsetka" id="datum_zavrsetka"
                            value="{{$projects->datum_zavrsetka}}" class="form-control"></br>
                        <input type="submit" value="Ažuriraj" class="btn btn-primary btn-block mb-3"></br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
