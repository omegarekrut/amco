var id = $('#firstQuestion').val();
var remainingQuest = $('#remainingQuestion').val();

function ShowAlert() {
    var email = document.getElementById("email-input");
    var filter = /^([a-zA-Z0-9_\.\-])+\@(amco+\.)+(it)+$/;
    if (!filter.test(email.value)) {
        document.getElementById("invalid-email-format").style.display = "block";
        email.focus;
        return false;
    } else {
        document.getElementById("invalid-email-format").style.display = "none";
    }
}


$(document).ready(function () {


    $("input:radio").removeAttr("checked");

    //$("input[name = 'choose-question']").attr("checked", false);


    $("input[id = '"+id+"']").attr("checked", true).tab("show")
    // let question_index = $("#pills-tabContent .tab-pane.active").val();
    let question_index = id
    
    $("#pills-tab input.medium").click(function (e) { 
        question_index = $(this).val();
        $("#submit-answer").prop("disabled", true);
    });

    $("input.btn-choose").change(function () {
        $("#submit-answer").prop("disabled", false);
    });
    
    $("#submit-answer").click(function (e) {
        let id_option = $(
        "#pills-tabContent .tab-pane.active input[name = 'options-" +
            question_index +
            "']:checked"
        ).attr("id");
        if (question_index <= 6) {
            question_index++;
            $("input[id = " + question_index + "]").attr("checked", true).tab("show");
            let question = id_option.split('.')[0];
            let answer = id_option.split('.')[1];
            $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                question: question,
                answer: answer
            },
            success: function (response) { 
                updateQuest( question_index ); 
                if( question_index == 7 ){ 
                    window.location.replace("ending.php"); 
                } 
            },
            });
        } else {
            window.location.replace("ending.php");
            $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                end_quiz: 1,
            },
            success: function (response) {
                
            },
            });
        }
    });
});



function updateQuest(question_index){

    $('#numQuest').html( question_index );
}