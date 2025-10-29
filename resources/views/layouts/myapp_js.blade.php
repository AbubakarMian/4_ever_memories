<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    })
//  $(document).ajaxError_show(
 $(document).ajaxError(
        function(event, jqXHR, ajaxSettings, thrownError) {
            console.log('[event:' + event + '], [jqXHR:' + jqXHR + '], [ajaxSettings:' + ajaxSettings +
                '], [thrownError:' + thrownError + '])');
        });

    
    function submit_form(form_by_id_or_class, success_funtion = '') {

        var form = $(form_by_id_or_class);
        var inputs = $(form_by_id_or_class + " input");
        var textareas = $(form_by_id_or_class + " textarea");
        var select = $(form_by_id_or_class + " select");
        // var textareas = $(form_by_id_or_class + " textarea").not('.ckeditor');
        // var cktextareas = $(form_by_id_or_class + " ckeditor");
        var all_inputs = $.merge($.merge(inputs, textareas),select);
        // console.log('all_inputs',all_inputs);
        // return;
        var formdata = new FormData();

        all_inputs.each(function() {
            var name = $(this).attr('name');
            console.log('name',name);
            if ($(this).attr('type') == 'file') {
                console.log('files', name, $(this)[0].files[0]);
                formdata.append($(this).attr('name'), $(this)[0].files[0]);
            } 
            else if ($(this).attr('type') == 'select') {
                formdata.append($(this).attr('name'), $(this).find('selected').val());
            } 
            else if($(this).hasClass("ckeditor")){
                var val = CKEDITOR.instances[$(this).attr('id')].getData();
                formdata.append($(this).attr('name'), val);
            }
            else {
                console.log('all_inputs', $(this).attr('name'), $(this).val());
                formdata.append($(this).attr('name'), $(this).val());
            }
        })
        // cktextareas.each()
        console.log('submit_form url',form.attr('action'));
        for (var pair of formdata.entries()) {
            console.log('form data values ',pair[0]+ ', ' + pair[1]); 
        }

        $.ajax({
            method: form.attr('method'),
            url: form.attr('action'),
            data: formdata,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',

            success: function(data) {
                if (success_funtion != '') {
                    window[success_funtion](form_by_id_or_class, data);
                }
            },
            error: function(err) {
                console.log('form failed', err);
            }

        })
    }

    function createModal(modal_param){
    var modal =  `
    <div class="modal fade" id="`+modal_param.id+`" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            `+modal_param.header+`
        </div>
        <div class="modal-body">
            `+modal_param.body+`
        </div>
        <div class="modal-footer">
            `+modal_param.footer+`
        </div>
      </div>

    </div>
  </div>
    `;
    $('#add_custom_modals').append(modal);

}

    function send_ajax(ajax, success_fun = '') {

        console.log('send ajax url',ajax.action);

        $.ajax({
            method: ajax.method,
            url: ajax.action,
            dataType: 'JSON',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',

            success: function(data) {
                if (success_fun != '') {
                    // call function by name and pass parameters eg sucess_function(form_by_id_or_class,data)
                    window[success_fun](data);
                }

            },
            error: function(err) {
                console.log('form failed', err);
            }

        })

    }
</script>
