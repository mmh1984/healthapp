

<script>

  document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
          theme:true,
          initialView: 'dayGridMonth',
          
          selectable:true,
    selectHelper:true,
      navLinks: true, // can click day/week names to navigate views
      dayMaxEvents: true, // allow "more" link when too many events
      events: {
        url:"controls/appall.php",
        
      },
      eventColor:"#298509",
      eventClick:function(res){
        $("#divreschedule").hide();
        $.ajax({
            type: "POST",
            url: "controls/appointments.php",
            data: {
                op: "appointments2",
                id:res.event.id
            },
            success: function(res) {
             
              var data=$.parseJSON(res)
              $("#appid1").val(data[0].appointmenid)
              $("#cname").html(data[0].cname)
              $("#cdoctor").html(data[0].dname)
              $("#ctime").html(data[0].apptime)
              $("#ctype").html(data[0].apptype)
              $("#clientid").val(data[0].clientid)
              $("#appdetails").show();

              var d=moment(Date()).format("YYYY-MM-DD");
              if(d==data[0].appdate){
                $("#btnpay").hide();
                $("#btncheckin").show();
                $("#btnreschedule").hide();
                if(data[0].status=="checkedin"){
                  $("#btnpay").show();
                  $("#btncheckin").hide();
                }
              }
              
              else{
                $("#btncheckin").hide();
                $("#btnreschedule").show();
                $("#btnpay").hide();
               
              }
            }

        });
      },
      eventDrop:function(res){
        var date=moment(res.event.start).format("YYYY-MM-DD");

        alert(date);
      }
        });
        calendar.render();
      });

    </script>