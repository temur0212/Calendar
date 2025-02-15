$(document).ready(function() {
	var calendar = $('#calendar').fullCalendar({
		editable: true,
		eventLimit: true,
		droppable: true,
		eventColor: "#D8E435",
		eventTextColor: "#000",
		eventBorderColor: "#CCC",
		eventResize: true,
		header: {
			center: 'title',
			left: 'prev, next today',
			right: 'listMonth, month, basicDay'
		},
		events: "ajax-endpoint/fetch-calendar.php",
		displayEventTime: false,
		eventRender: function(event, element) {
			element.find(".fc-content").prepend("<span class='btn-event-delete'> X </span>");
			element.find("span.btn-event-delete").on("click", function() {
				if (confirm("Haqiqatdan xam  o'chirishmoqchimisiz")) {
					deleteEvent(event);
				}
			});
		},
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			var title = prompt('Bayram nomi kiriting:');
	

			if (title) {
				var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
				var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
				addEvent(title, start, end);

				calendar.fullCalendar('renderEvent',
					{
						title: title,
						start: start,
						end: end,
						allDay: allDay
					},
					true
				);
			}
			calendar.fullCalendar('unselect');
		},

		eventClick: function(event) {
			var title = prompt('Taxrirlash', event.title);
			if (title) {
				var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
				var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
				editEvent(title, start, end, event);
			}
		},
		eventDrop: function(event) {
			var title = event.title;
			if (title) {
				var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
				var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
				editEvent(title, start, end, event);
			}
		},
		eventResize: function(event) {
			var title = event.title;
			if (title) {
				var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
				var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
				editEvent(title, start, end, event);
			}
		}
	});
	
});
function addEvent(title, start, end) {
	$.ajax({
		url: 'ajax-endpoint/add-calendar.php',
		data: 'title=' + title + '&start=' + start + '&end=' + end,
		type: "POST",
		success: function(data) {
			displayMessage("Muavfaqiyatli qo'shildi");
		}
	});
}

function editEvent(title, start, end, event) {
	$.ajax({
		url: 'ajax-endpoint/edit-calendar.php',
		data: 'title=' + title + '&start=' + start + '&end=' + end + '&id=' + event.id,
		type: "POST",
		success: function() {
			displayMessage("Yangilandi");
		}
	});
}

function deleteEvent(event) {
	$('#calendar').fullCalendar('removeEvents', event._id);
	$.ajax({
		type: "POST",
		url: "ajax-endpoint/delete-calendar.php",
		data: "&id=" + event.id,
		success: function(response) {
			if (parseInt(response) > 0) {
				$('#calendar').fullCalendar('removeEvents', event.id);
				displayMessage("O'chirildi");
			}
		}
	});
}
function displayMessage(message) {
	$(".response").html("<div class='success'>" + message + "</div>");
	setInterval(function() { $(".success").fadeOut(); }, 4000);
}

