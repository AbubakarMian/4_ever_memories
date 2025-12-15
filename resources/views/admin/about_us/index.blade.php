@extends('layouts.default_module')
@section('module_name')
About Us
@stop

@section('add_btn')

{!! Form::open(['method' => 'get', 'url' => ['admin/about_us/result/update_about_us_result'], 'files' => true]) !!}
<!-- <span>{!! Form::submit('Update All', ['class' => 'btn btn-success pull-right']) !!}</span> -->
{!! Form::close() !!}
@stop
@section('table-properties')
width="100%" style="table-layout:fixed;"
@endsection

<style>
    .fhgyt {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    .fhgyt th {
        border: 1px solid #e3e6f3 !important;
        padding: 8px;
        background: #f8f9fc;
        font-weight: bold;
        text-align: left;
    }

    .fhgyt td {
        border: 1px solid #e3e6f3 !important;
        background: #f9f9f9;
        padding: 8px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: top;
    }

    /* Specific column widths */
    .fhgyt th:nth-child(1), /* Subject */
    .fhgyt td:nth-child(1) {
        width: 15%;
    }

    .fhgyt th:nth-child(2), /* Title */
    .fhgyt td:nth-child(2) {
        width: 20%;
    }

    .fhgyt th:nth-child(3), /* Description */
    .fhgyt td:nth-child(3) {
        width: 25%;
        white-space: normal !important;
        word-wrap: break-word;
    }

    .fhgyt th:nth-child(4), /* Tags */
    .fhgyt td:nth-child(4) {
        width: 15%;
    }

    .fhgyt th:nth-child(5), /* Image */
    .fhgyt td:nth-child(5) {
        width: 10%;
        text-align: center;
    }

    .fhgyt th:nth-child(6), /* Edit */
    .fhgyt td:nth-child(6) {
        width: 7.5%;
        text-align: center;
    }

    .fhgyt th:nth-child(7), /* Delete */
    .fhgyt td:nth-child(7) {
        width: 7.5%;
        text-align: center;
    }

    .imgshow {
        max-width: 80px;
        max-height: 60px;
        object-fit: cover;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn {
        white-space: nowrap;
        padding: 4px 8px;
        font-size: 12px;
    }

    /* DataTable responsive */
    .dataTables_wrapper {
        overflow-x: auto;
    }

    /* Ensure table container doesn't overflow */
    .table-container {
        overflow-x: auto;
        max-width: 100%;
    }
</style>

@section('table')
<div class="table-container">
    <table class="fhgyt" id="about_usTableAppend" style="opacity: 0">
        <thead>
            <tr>
               
                <th>Description 1</th>
                <th>Description 2</th>
                <th>Image</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@stop

@section('app_jquery')
<script>
    $(document).ready(function() {
        fetchRecords();

        function fetchRecords() {
            $.ajax({
                url: '{!!asset("admin/about_us/get_about_us")!!}',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log('response', response);
                    $("#about_usTableAppend").css("opacity", 1);
                    var res = response['response'];
                    var len = response['response'].length;

                    for (var i = 0; i < len; i++) {
                        var id = res[i].id;
                        var description_first = res[i].description_first;
                        var description_second = res[i].description_second;
                        var image = `<img src="` + res[i].image + `" class="show-product-img imgshow" onclick="show_imge_in_modal(this)">`;
                        var edit = `<a class="btn btn-info" href="{!!asset('admin/about_us/edit/` + id + `')!!}">Edit</a>`;
                        
                        createModal({
                            id: 'about_us_' + res[i].id,
                            header: '<h4>Delete</h4>',
                            body: 'Do you want to continue ?',
                            footer: `
                                <button class="btn btn-danger" onclick="delete_request(` + id + `)"
                                data-dismiss="modal">
                                    Delete
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                `,
                        });
                        

                        var tr_str = "<tr id='row_" + res[i].id + "'>" +
                            // "<td title='" + description_first + "'>" + description_first.substring(0, 100) + (description_first.length > 100 ? '...' : '') + "</td>" +
                            // "<td title='" + description_second + "'>" + description_second.substring(0, 100) + (description_second.length > 100 ? '...' : '') + "</td>" +
                            "<td>" + description_first + "</td>" +
                            "<td>" + description_second + "</td>" +
                            "<td>" + image + "</td>" +
                            "<td>" + edit + "</td>" +
                            "</tr>";

                        $("#about_usTableAppend tbody").append(tr_str);
                    }
                    
                    // Initialize DataTable after populating data
                    $('#about_usTableAppend').DataTable({
                        dom: '<"top_datatable"B>lftipr',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        responsive: true,
                        autoWidth: false,
                        scrollX: true,
                        language: {
                            emptyTable: "No about_uss found"
                        }
                    });
                }
            });
        }
    });

    function set_msg_modal(msg) {
        $('.set_msg_modal').html(msg);
    }
    
    function delete_request(id) {
        $.ajax({
            url: "{!!asset('admin/about_us/delete')!!}/" + id,
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{!!@csrf_token()!!}'
            },
            success: function(response) {
                console.log(response.status);
                if(response){
                    var myTable = $('#about_usTableAppend').DataTable();
                    myTable.row('#row_'+id).remove().draw();
                }
            }
        });
    }
</script>
@endsection