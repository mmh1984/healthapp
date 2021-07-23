function get_appointments() {



    $.ajax({
        type: "POST",
        url: "controls/badges.php",
        data: {
            op: "appointments"
        },
        success: function(res) {
            $("#appointmentbadge").html(res);
        }


    })

}

function get_history() {



    $.ajax({
        type: "POST",
        url: "controls/badges.php",
        data: {
            op: "history"
        },
        success: function(res) {
            $("#historybadge").html(res);
        }


    })

}

function get_doctor() {



    $.ajax({
        type: "POST",
        url: "controls/badges.php",
        data: {
            op: "doctor"
        },
        success: function(res) {
            $("#doctorbadge").html(res);
        }


    })

}

function get_patient() {



    $.ajax({
        type: "POST",
        url: "controls/badges.php",
        data: {
            op: "patient"
        },
        success: function(res) {

            $("#patientbadge").html(res);
        }


    })

}