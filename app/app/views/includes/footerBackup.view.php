<script src="<?=ROOT?>/template/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?=ROOT?>/template/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?=ROOT?>/template/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?=ROOT?>/template/assets/js/plugins/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=ROOT?>/template/assets/js/now-ui-dashboard.js" type="text/javascript"></script>

<!-- select button Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/fc-4.2.1/r-2.4.0/sc-2.0.7/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>









  <!--  Moment.js    -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha512-i2CVnAiguN6SnJ3d2ChOOddMWQyvgQTzm0qSgiKhOqBMGCx4fGU5BtzXEybnKatWPDkXPFyCI0lbG42BnVjr/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
  
  <!--  notificacion.js    -->
  <script src="<?=ROOT?>/assets/js/bootstrap-notify.js"></script>

    <!--  datepicker.js    -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

 <!--  confirm.js    -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

  <script>
    function showNotification(from,align,message,icon,color){
    color = color;

    $.notify({
        icon: icon,
        message: message

      },{
          type: color,
          timer: 100,
          placement: {
              from: from,
              align: align
          }
      });
}

function load_unseen_notification(view ='YES')
 {
  //document.getElementById("#navbarDropdownToggle").html = "";
  $.ajax({
  url: "<?=ROOT?>Notification",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    //console.log(data);
   // var size = data.length;
    ////console.log(data.count);
    // $('.dropdown-menu').html(data.notification);
    var received = JSON.parse(JSON.stringify(data));
       var received = received.data;
      //  if (typeof received != 'undefined' || received.data ==false)
      //  {
      // Object.keys(received).forEach(key => {
      //   //demoP = document.getElementById("demo");
      //   // demoP.innerHTML = demoP.innerHTML + "" + key + " : <b>" + received[key] + "<br>";
      //   ////console.log(received[key].Supervisor,received[key].CoachingDate );
      //   // <span class="dropdown-item-text">Dropdown item text</span>
      //   var li = '<span class="dropdown-item-text">' + received[key].Supervisor + ' has coached you on ' + moment(received[key].CoachingDate).format("MM/DD/YYYY") +'</span>';
      //       $('#navbarDropdownToggle').append(li,'<br>');
      //           })
      //           ;
      //  }else{
          
      //   var li = '<li class="nav-item">No Notification Found</li>';
      //       $('#navbarDropdownToggle').append(li,'<br>');
      //  }
              //$('#navbarDropdownToggle').append();

    if(data.count > 0)
    {
     $('.count').html(data.count);
    }else
    {
      $('.count').html('');
    }
   }
  });
 }
 
 load_unseen_notification();

//  $(document).on('click', '#navbarDropdownToggle', function(){
//   $('.count').html('');
//   //alert('clicked');
//   l//oad_unseen_notification('YES');
//  });

//  setInterval(function(){ 
//   load_unseen_notification();
//  }, 5000);

 

  </script>

  
  