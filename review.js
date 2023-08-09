$(document).ready(function() {
    //Jquery here...
    var urlParams = new URLSearchParams(window.location.search);
    var gg = urlParams.get("id");
    var k=parseInt(gg.slice(1));
    console.log("Clicked Element ID:", k);
    // var k = 3;
    $.ajax({
        url: "question.json",
        type: "POST",
        success: function(data) {
            var str = JSON.parse(data[k]["content_text"]);
            var options = (JSON.parse(data[k]["content_text"]).answers).length;

            $(".question").text(str.question);
            $(".snippet").append(str.explanation);

            $(".options").empty();

            for (i = 0; i < options; i++) {
                $(".options").append(
                    '<div class="form-check"><input type="radio" class="form-check-input " id="radio' +
                    (i + 1) +
                    '"name="optradio" value="' +
                    i +
                    '"><label class= "answer form-check-label d-block " for= "' +
                    JSON.parse(data[0]["content_text"]).answers[i].answer +
                    '">' +
                    str.answers[i].answer +
                    "</label></div>"    
                );
            }

            $(".form-check-input").click(function() {
                sessionStorage.setItem("option0", $(this).attr("value"));
            });
            itemValue = sessionStorage.getItem("option0");
            if (itemValue !== null) {
                $('input[value="' + itemValue + '"]').click();
                $('input[value="' + itemValue + '"]').addClass('bg-danger');
            }
            $(".form-check-input").attr("disabled", "true");

            if (sessionStorage.getItem("result" + k) == 1) {
                $(".checkit").append(
                    '<button class="btn btn-success d-flex mx-auto">Correct</button>'
                );
            } else if (sessionStorage.getItem("result" + k) == 0) {
                $(".checkit").append(
                    '<button class="btn btn-warning d-flex mx-auto">Incorrect</button>'
                );
            } else {
                $(".checkit").append(
                    '<button class="btn btn-danger d-flex mx-auto">Unattempt</button>'
                );
            }


            //function for selecting all correct answers
            function selectCorrect(que_no) {
                for (ans_no = 0; ans_no < options; ans_no++) {
                    if (
                        JSON.parse(data[que_no]["content_text"]).answers[ans_no][
                            "is_correct"
                        ] == 1
                    ) {
                        $("#radio" + (ans_no + 1)).addClass("bg-success");
                    }
                }
            }
            selectCorrect(k);

            $(".data").text((k+1)+ " of " + data.length);
            if (k == 0) {
                $(".prev").prop("disabled", true);
            } // disabling prev button by default

            //Everything on pressing next
            $(".next").click(function() {
                $(".options").empty();
                $(".checkit").empty();
                $(".snippet").empty();

                $(".prev").prop("disabled", false);
                k = k + 1;
                if (k > data.length - 1) {
                    k = data.length - 1;
                } else {
                    $(".question").text(JSON.parse(data[k]["content_text"]).question);
                    for (i = 0; i < options; i++) {
                        $(".options").append(
                            '<div class="form-check"><input type="radio" class="form-check-input" id="radio' +
                            (i + 1) +
                            '" name="optradio" value="' +
                            i +
                            '"><label class="answer form-check-label d-block" for="' +
                            JSON.parse(data[k]["content_text"]).answers[i].answer +
                            '">' +
                            JSON.parse(data[k]["content_text"]).answers[i].answer +
                            "</label></div>"
                        );
                    }
                    if (k <= 8) {
                        $(".data").text((k + 1) + " of " + data.length);
                    } else {
                        $(".data").text("" + (k + 1) + " of " + data.length);
                    }

                    if (k == data.length - 1) {
                        $(".next").prop("disabled", true);
                    }
                    $(".form-check-input").click(function() {
                        $.post(
                            "testingdata.php", {
                                question: k,
                                answer: $(this).val(),
                            },
                            function(data) {
                                sessionStorage.setItem("result" + k, data);
                                itemValue = sessionStorage.getItem("result" + k);
                            }
                        );
                    });

                    $(".form-check-input").click(function() {
                        sessionStorage.setItem("option" + k, $(this).attr("value"));
                    });
                    itemValue = sessionStorage.getItem("option" + k);
                    if (itemValue !== null) {
                        $('input[value="' + itemValue + '"]').click();
                        $('input[value="' + itemValue + '"]').addClass(
                            "bg-danger"
                        );
                    }
                    $(".form-check-input").attr("disabled", "true");

                    if (sessionStorage.getItem("result" + k) == 1) {
                        $(".checkit").append(
                            '<button class="btn btn-success d-flex mx-auto">Correct</button>'
                        );
                    } else if (sessionStorage.getItem("result" + k) == 0) {
                        $(".checkit").append(
                            '<button class="btn btn-warning d-flex mx-auto">Incorrect</button>'
                        );
                    } else {
                        $(".checkit").append(
                            '<button class="btn btn-danger d-flex mx-auto">Unattempt</button>'
                        );
                    }
                    $(".snippet").append(
                        JSON.parse(data[k]["content_text"]).explanation
                    );
                    selectCorrect(k);
                }
            });

            //Everything on pressing prev
            $(".prev").click(function() {
                $(".options").empty();
                $(".checkit").empty();
                $(".snippet").empty();
                $(".next").prop("disabled", false);
                k = k - 1;
                if (k < 0) {
                    k = 0;
                } else {
                    $(".question").text(JSON.parse(data[k]["content_text"]).question);

                    for (i = 0; i < options; i++) {
                        $(".options").append(
                            '<div class="form-check"><input type="radio" class="form-check-input" id="radio' +
                            (i + 1) +
                            '" name="optradio" value="' +
                            i +
                            '"><label class="answer form-check-label d-block" for="' +
                            JSON.parse(data[k]["content_text"]).answers[i].answer +
                            '">' +
                            JSON.parse(data[k]["content_text"]).answers[i].answer +
                            "</label></div>"
                        );
                    }

                    if (k <= 8) {
                        $(".data").text((k + 1) + " of " + data.length);
                    } else {
                        $(".data").text("" + (k + 1) + " of " + data.length);
                    }
                    if (k == 0) {
                        $(".prev").prop("disabled", true);
                    }
                    $(".form-check-input").click(function() {
                        $.post(
                            "testingdata.php", {
                                question: k,
                                answer: $(this).val(),
                            },
                            function(data) {
                                sessionStorage.setItem("result" + k, data);
                                itemValue = sessionStorage.getItem("result" + k);
                            }
                        );
                    });
                    $(".form-check-input").click(function() {
                        sessionStorage.setItem("option" + k, $(this).attr("value"));
                    });
                    itemValue = sessionStorage.getItem("option" + k);
                    if (itemValue !== null) {
                        $('input[value="' + itemValue + '"]').click();
                        $('input[value="' + itemValue + '"]').addClass(
                            "bg-danger"
                        );
                    }
                    $(".form-check-input").attr("disabled", "true");
                    if (sessionStorage.getItem("result" + k) == 1) {
                        $(".checkit").append(
                            '<button class="btn btn-success d-flex mx-auto">Correct</button>'
                        );
                    } else if (sessionStorage.getItem("result" + k) == 0) {
                        $(".checkit").append(
                            '<button class="btn btn-warning d-flex mx-auto">Incorrect</button>'
                        );
                    } else {
                        $(".checkit").append(
                            '<button class="btn btn-danger d-flex mx-auto">Unattempt</button>'
                        );
                    }
                    $(".snippet").append(
                        JSON.parse(data[k]["content_text"]).explanation
                    );
                    selectCorrect(k);
                }
            }); //End of prev click function


        }, // success: function (data) ends here
    }); //.ajax() ends here

    $(".list-bt").click(function() {
        $(".list-group").toggle();
    });
    $(".position").click(function() {
        $(".list-group").hide();
    });
    $(".itmlist").click(function() {
        $(".list-group").toggle();
    });

    $(".end").click(function() {
        $(".modal").show();
    });

    $(".modclose").click(function() {
        $(".modal").hide();
    });
    $(".goback").click(function() {
        sessionStorage.clear();
        window.location.href = "index.php";
    });
    //Start of result page
    // $(".endtest").show(".result-page");
});