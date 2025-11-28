@extends('layouts.default_module')
@section('module_name')
MEMORIALS
@stop


@section('table-properties')
    width="400px" style="table-layout:fixed;"
@endsection



<style>
    td {
        white-space: nowrap;
        overflow: hidden;
        width: 30px;
        height: 30px;
        text-overflow: ellipsis;
    }

    .fhgyt th {
        border: 1px solid #e3e6f3 !important;
    }

    .fhgyt td {
        border: 1px solid #e3e6f3 !important;
        background: #f9f9f9
    }
</style>
@section('table')

    <table class="fhgyt" id="userTableAppend" style="opacity: 0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Gallery</th>
                <th>Restore </th>
                <th>View as user </th>


            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

@stop
@section('app_jquery')

    <script>
        $(document).ready(function() {

            fetchRecords();

            function fetchRecords() {

                $.ajax({
                    url: '{!! asset("admin/memorials/getmemorials") !!}',
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log('response');
                        $("#userTableAppend").css("opacity", 1);
                        var len = response['data'].length;
                        console.log('response2');

                        console.log(response);

                        for (var i = 0; i < len; i++) {
                            // if(response['data'][i].deleted_at){
                            //     continue;
                            // }
                            var id = response['data'][i].id;
                            // var memorial_id = response['data'][i].memorial_id;
                            var name = response['data'][i].f_name;
                            var image = `<img src="` +response['data'][i].image_show_var+ `" width="24%">`;
                            var gallery =
                            `<a class="btn btn-info" target="_blank" href="{!! asset('admin/memoraials/gallery/` + id + `') !!}">Gallery</a>`;
                            createModal({
                                id: 'memorial_' + response['data'][i].id,
                                header: '<h4>Restore</h4>',
                                body: 'Do you want to continue ?',
                                footer: `
                                <button class="btn btn-danger" onclick="restore_request(` + response['data'][i].id + `)"
                                data-dismiss="modal">
                                    Restore
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                `,
                            });
                            var delete_btn ='';
                            if(response['data'][i].deleted_at){
                           
                                 delete_btn =
                                `<a class="btn btn-info delete_btn_`+response['data'][i].id+`" data-toggle="modal" data-target="#` +
                                'memorial_' + response['data'][i].id + `">Restore</a>`;

                            }
                            var view_as_user_btn = `<a class="btn btn-info" href="{!! asset('admin/memorial/view_as_user/') !!}/` + response['data'][i].id + `">View</a>`;
                            
                            var tr_str = `<tr id='row_` + response['data'][i].id + `'>` +
                                "<td>" + name + "</td>" +
                                "<td>" + image + "</td>" +
                                "<td>" + gallery + "</td>" +
                                "<td>" + delete_btn + "</td>" +
                                "<td>" + view_as_user_btn + "</td>" +


                                "</tr>";

                            $("#userTableAppend tbody").append(tr_str);
                        }
                        $(document).ready(function() {
                            console.log('sadasdasdad');
                            $('#userTableAppend').DataTable({
                                dom: '<"top_datatable"B>lftipr',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ],
                            });
                        });
                    }
                });
            }

        });

        function set_msg_modal(msg) {
            $('.set_msg_modal').html(msg);
        }

        function restore_request(id) {
            $.ajax({

                url: "{!! asset('admin/memorial/restore') !!}/" + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: '{!! @csrf_token() !!}'
                },
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        var myTable = $('#userTableAppend').DataTable();
                        location.reload();
                        myTable.row('.delete_btn_' + id).html('').draw();
                        // myTable.row('#row_' + id).remove().draw();
                    }
                }
            });
        }
    </script>
@endsection
