@extends('layouts.default_module')
@section('module_name')
User
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
        <th>Email</th>
        <!-- <th>Role</th> -->
        <th>SingIn</th>
        <th>Memorials</th>
     
        




	</tr>
</thead>
<tbody>
</tbody>
</table>

@stop
@section('app_jquery')

<script>
$(document).ready(function(){

    fetchRecords();

    function fetchRecords(){

       $.ajax({
        url: '{!!asset("admin/user/getOnlyUsers")!!}',
         type: 'get',
         dataType: 'json',
         success: function(response){
            console.log('response');
            $("#userTableAppend").css("opacity",1);
           var len = response['data'].length;

           console.log(response);

              for(var i=0; i<len; i++){
                  var id =  response['data'][i].id;
                  var name =  response['data'][i].first_name;
                  var email =  response['data'][i].email;
                  var role_id =  response['data'][i].role_id;
                  
                  // Pass email instead of user ID
                  var signin = `<button class="btn btn-info" onclick="signInAsUser('${email}')">Sign As User</button>`;
                  var memorials = `<button class="btn btn-info" onclick="viewMemorial('${email}')">Memorials</button>`;
                  
                  if(response['data'][i].role_id == 1){
                    user_type ='Admin'
                        }
                        else if (response['data'][i].role_id == 2){
                    user_type ='User'
                        }
                        else if (response['data'][i].role_id == 3){
                    user_type ='Teacher'
                        }
                        else if (response['data'][i].role_id == 4){
                    user_type ='Employee'
                        }
                  var image  = response['data'][i].image;

                if(!image){
                    image = "{!!asset('public/images/logo.png')!!}"
                    console.log('no image');
                }

                var tr_str = "<tr>" +
                    "<td>" +name+ "</td>" +
                    "<td>" +email+ "</td>" +
                    // "<td>" +user_type+ "</td>" +
                    "<td>" +signin+ "</td>" +
                    "<td>" +memorials+ "</td>" +
                "</tr>";

                $("#userTableAppend tbody").append(tr_str);
                }
                
                $('#userTableAppend').DataTable({
                    dom: '<"top_datatable"B>lftipr',
                        buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                });
        }
       });
    }

});

// Updated function to accept email
function signInAsUser(userEmail) {
    console.log('Signing in as user with email:', userEmail);
    
    $.ajax({
        url: '{!!route("user.view_as_user")!!}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            email: userEmail  // Changed from user_id to email
        },
        success: function(response) {
            if (response.success) {
                window.location.href = response.redirect_url;
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr) {
            console.log('Error response:', xhr.responseJSON);
            alert('Error: User not found or authentication failed');
        }
    });
}
function viewMemorial(userEmail) {
    console.log('Signing in as user with email:', userEmail);
    
    $.ajax({
        url: '{!!route("user.view_memorials")!!}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            email: userEmail  // Changed from user_id to email
        },
        success: function(response) {
            if (response.success) {
                window.location.href = response.redirect_url;
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr) {
            console.log('Error response:', xhr.responseJSON);
            alert('Error: User not found or authentication failed');
        }
    });
}

function set_msg_modal(msg){
    $('.set_msg_modal').html(msg);
}
</script>
@endsection

