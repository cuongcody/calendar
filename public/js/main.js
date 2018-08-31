$(document).ready(function () {
    
      $.ajax({
          type: "get",
          url: "?req=home/all_ajax",
          data: "data",
          dataType: "json",
          success: function (response) {
            console.log(response);
            if (response.status_code == 200) {
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                      },
                      navLinks: true, // can click day/week names to navigate views
                      editable: true,
                      eventLimit: true, // allow "more" link when too many events
                      events: response.works,
                       eventRender: function(event, element) {
                            element.prepend( "<a href='?req=home/edit/" + event.id + "' class='edit-btn text-right'>Edit</a><span class='closeon text-right'>X</span>" );
                            console.log(event);
                            element.find(".closeon").click(function() {
                                $.ajax({
                                    type: "post",
                                    url: "?req=home/delete_ajax",
                                    data: {id: event.id},
                                    dataType: "json",
                                    success: function (response) {
                                        console.log(response);
                                        if (response.status_code == 200) {
                                            console.log('123');
                                            $('#calendar').fullCalendar('removeEvents',event._id);
                                        }
                                    }
                                });
                            
                            });
                        }
                  })
            }
          }
      });
});
