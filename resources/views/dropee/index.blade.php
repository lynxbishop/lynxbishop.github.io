@extends('layouts.app')
@section('style')
<style>
    table {
        table-layout: fixed;
    }
    table tr > td {
        text-align:center;
    }
</style>
@endsection
@section('content')
    <div class="container">
        <h2>Dropee Assesment Frontend</h2>
        <a class="btn btn-success" href="{{ route('dropee.manage') }}">Manage</a>
        <div class="card shadow">
            <div class="card-header">
                <table id="mainTable" class="table table-bordered mb-2 mt-2">
                    @foreach($grids as $gridGroups)
                        <tr>
                            @foreach($gridGroups as $gridItem)
                                @isset($gridItem->pivotItem)
                                    <td style="{{ str_replace(",",';',str_replace(['"','{','}'],"",$gridItem->pivotItem->getStyle->text_style)) }}">{!! $gridItem->pivotItem->name !!}</td>
                                @else
                                    <td>&nbsp;</td>
                                @endisset
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
