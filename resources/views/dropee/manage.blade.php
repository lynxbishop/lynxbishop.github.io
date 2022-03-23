@extends('layouts.app')
@section('style')
<style>
    table {
        table-layout: fixed;
    }
    table tr > td {
        text-align:center
    }
    .td-success {
        color:green !important;
        font-weight:bold;
        text-decoration: none;
    }
    .td-empty {
        color:red;
    }
    a {
        color:inherit;
    }
    a:hover  {
        text-decoration:none;
        color:inherit;
    }
</style>
@endsection
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="dropeeModal" tabindex="-1" role="dialog" aria-labelledby="dropeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="dropeeModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="dropeeForm" action="{{ route('dropee.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">Text</div>
                            <div class="col-md-8">
                                <select id='item' class="form-control" name="item">
                                    @foreach($dropDownList as $dropDownItem)
                                        <option value={!! $dropDownItem->id !!}>{!! $dropDownItem->name  !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">Colour</div>
                            <div class="col-md-8"><input class="form-control" type="color" id="favcolor" name="favcolor" value="#000000"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">Style</div>
                            <div class="col-md-8">
                                <select class="form-control" name="fontWeight" id="fontWeight">
                                    <option value="normal">Normal</option>
                                    <option value="bold">Bold</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="position">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-update">Save changes</button>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <h2>Dropee Assesment Manage</h2>
        <a class="btn btn-success" href="{{ route('dropee.frontend') }}">Frontend</a>
        <div class="card shadow">
            <div class="card-header">
                <table id="mainTable" class="table table-bordered mb-2 mt-2">
                    @foreach($grids as $key => $gridGroups)
                        <tr>
                            @foreach($gridGroups as $gridItem)
                                @isset($gridItem->pivotItem)
                                    <td style="{{ str_replace(",",';',str_replace(['"','{','}'],"",$gridItem->pivotItem->getStyle->text_style)) }}"><a href="#" data-toggle="modal" data-id="{{ $gridItem->id }}" data-item="{{ $gridItem->pivotItem->id }}" data-style="{{ str_replace('-','_',$gridItem->pivotItem->getStyle->text_style) }}" data-target="#dropeeModal">{!! $gridItem->pivotItem->name !!}</a></td>
                                @else
                                    <td class="td-empty"><a href="#" data-toggle="modal" data-id="{{ $gridItem->id }}" data-target="#dropeeModal">Change</a></td>
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
    <script>
    $(document).ready(function() {
        var form = $('#dropeeForm');
        var modal = $('#dropeeModal');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        modal.on('show.bs.modal', function(e) {
            let id = $(e.relatedTarget).data('id');
            let item = $(e.relatedTarget).data('item');
            let style = $(e.relatedTarget).data('style');
            if(item!==undefined){
                $('#item').val(item);
                $('#fontWeight').val(style.font_weight);
                $('#favcolor').val(style.color);
            }
            $('#dropeeModalLabel').text('Update grid '+id);
            $('input[name=position]').val(id);
        });
        $('.save-update').on('click',function(){
            $.ajax({
                method: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success:function(data){
                    modal.modal('hide');
                    if(data==false){
                        alert('data not saved');
                    } else {
                        location.reload()
                    }
                }
            })

        })
    });
    </script>
@endsection
