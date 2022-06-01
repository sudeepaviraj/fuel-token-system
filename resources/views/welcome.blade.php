<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css" integrity="sha512-LT9fy1J8pE4Cy6ijbg96UkExgOjCqcxAC7xsnv+mLJxSvftGVmmc236jlPTZXPcBRQcVOWoK1IJhb1dAjtb4lQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Petrol Token Reservation</title>
  </head>
  <body>
<div class="container  ">
    <div class="row text-center">
            <h4>Reserve</h4>
    </div>
    <div class="row border justify-content-center w-50 m-auto ">
            <div class="input-group flex-nowrap mb-3 mt-5">
                <input required name="id" maxlength="12" id="id" type="text" class="form-control" placeholder="Type Your NIC Here..."  aria-describedby="addon-wrapping">
                <span class="input-group-text" id="addon-wrapping">
                    <div id="keyboard" class="keyboard">
                        <i class="fas fa-keyboard"></i>
                    </div>
                    <div id="spinner" class="spinner-grow-sm spinner-grow" role="status">
                    </div>
                    <div id="success" class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                    <div id="failed" class="text-danger">
                        <i class="fa fa-xmark" aria-hidden="true"></i>
                    </div>
                </span>
            </div>
            <div class="input-group mb-3 mt-2">
                <input required readonly id="num" name="num" type="text" class="form-control" placeholder="Your Mobile Number Here..." aria-describedby="basic-addon1" maxlength="10">
                <span class="input-group-text" id="addon-wrapping">
                    <div id="check" class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                    <div id="false" class="text-danger">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </span>
            </div>
            <div class="input-group mb-3 mt-2">
                <input required readonly id="name" name="name" type="text" class="form-control" placeholder="Your Name Here..." aria-describedby="basic-addon1">
            </div>
            <div class="input-group flex-nowrap">
                <input required readonly id="datetime" placeholder="Select Preferd Date" name="datetime" class="form-control" aria-describedby="addon-wrapping" >
                <span class="input-group-text" id="addon-wrapping">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
            </div>
            <div class="input-group mb-3 mt-2 justify-content-center">
                <button id="reserve"  class="btn btn-outline-success">Reserve Now
                    <span id="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>

</div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js" integrity="sha512-s5u/JBtkPg+Ff2WEr49/cJsod95UgLHbC00N/GglqdQuLnYhALncz8ZHiW/LxDRGduijLKzeYb7Aal9h3codZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
    $(document).ready(function () {
    $('#loader').hide();
    $('#spinner').hide();
    $('#check').hide();
    $('#false').hide();
    $('#failed').hide();
    $('#success').hide();
    $('#datetime').datetimepicker({
    dateFormat: 'yy/mm/dd',
    controlType: 'select',
	oneLine: true,
	timeFormat: 'HH:mm',
    minDate:new Date(),
    stepMinute: 5
    });

});
$('#id').on('keypress', function onEvent(event) {
  console.log($('#id').val().length);
  $('#spinner').show();
  $('#failed').hide();
  $('#success').hide();
  var nic = $('#id').val();
  if(event.key=='v'||event.key=='V'){
      if(nic.length==9||nic.length==10){
          $('#success').show();
          $('#spinner').hide();
          $('#keyboard').hide();
          console.log('Valid NIC')
          $('#id').prop('maxlength',10)
          $('#num').prop('readonly',false)
      }
      else{
          $('#sucess').hide();
          console.log('Invalid NIC')
          $('#spinner').hide();
          $('#keyboard').hide();
          $('#failed').show();
          $('#id').prop('maxlength',12)
          $('#num').prop('readonly',true)
      }
  }
  else{
      $('#id').prop('maxlength',12)
      $('#num').prop('readonly',true)
  }

  $('#keyboard').hide();
  var data = $('#id').val();
  if(data.length==11||data.length==12){
      console.log('Valid NIC')
      $('#spinner').hide();
      $('#failed').hide();
      $('#success').show();
      $('#num').prop('readonly',false)
      $('#id').prop('maxlength',12)
  }
  else{
      $('#num').prop('readonly',true)
  }
});
$('#id').on('change', function () {
        $.ajax({
            type: "GET",
            url: "{{ url('find_user') }}",
            data: {
                nic:$('#id').val()
            },
            success: function (data) {
                if($('#id').val()==data['nic']){
                    $('#name').val(data['name'])
                    $('#num').prop('readonly',true)
                    $('#num').val(data['mobile'])
                }
            }
        });

    });
$('#num').on('keypress', function () {
    if($('#num').val().length<9){
        $('#num').prop('class','form-control border-danger');
        $('#false').show();
        $('#check').hide();
    }
    else{
        $('#num').prop('class','form-control');
        $('#check').show();
        $('#false').hide();
        $('#name').prop('readonly',false);
    }
});
$('#reserve').on('click', function () {
    $('#reserve').prop('disabled',true);
    $('#loader').show();
    $.ajax({
        type: "POST",
        url:"{{ url('new_user') }}",
        data: {
            _token: "{{ csrf_token() }}",
            nic:$('#id').val(),
            name:$('#name').val(),
            mobile:$('#num').val(),
            date_time:$('#datetime').val()
        },
        success: function (data) {
            console.log(data)
            Swal.fire({
            title: 'Reservation Added ',
            text: "Reservation Added Successfully !",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok!'
            }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
            })
            $('#reserve').prop('disabled',false);
            $('#loader').hide();


        },
        error:function (xhr, textStatus, errorThrown){
            Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'Reservation Adding Failed',
            footer:errorThrown
            })
            $('#reserve').prop('disabled',false);
            $('#loader').hide();


        }
    });

});

</script>
</html>
