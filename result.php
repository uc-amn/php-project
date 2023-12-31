<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.ucertify.com/layout/themes/bootstrap4/ux/css/bootstrap4.css">
    <link rel="stylesheet" href="https://www.ucertify.com/utils/?util=icomoon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        td {
            cursor: pointer;
        }

        .snippet {
            text-align: center;
        }

        .options {
            padding: 11px;
        }

        #time {
            font-family: monospace;
        }

        .ic {
            position: relative;
            margin-right: 3px;
            top: 4px;
        }

        .cont {
            width: 12%;
            height: 5%;
            position: fixed;
            bottom: 10px;
            right: 50px;
        }

        @media screen and (max-width: 756px) {
            .cont {
                width: 120px;
                right: 15px;
                position: fixed;
            }

            .ic {
                top: 5px;
            }

            h1 {}
        }
    </style>
</head>

<body>
    <?php include("./header.html") ?>
    <div class="container result-page">

        <div class="row clearfix justify-content-center clearfix mb-3">
            <div class="w-auto">
                <div class="filter option-set mr-2" id="filters-action" data-filter-group="button_filter"
                    intro-id="filter_action">
                    <button class="btn btn-light custom_btn outline1 filters-action px-2 px-md-5">
                        <div>
                            <span class="icomoon-reports-sm mr-sm text-indigo s3 top2 relative"></span>
                            <span class=" result d-inline-block font18 text-indigo">
                                1%
                            </span>
                        </div>
                        <span class="d-none d-md-inline-block">
                            Result
                        </span>

                    </button>
                    <button class="btn btn-light custom_btn outline1 filters-action px-2 px-md-4" data-filter-value="">
                        <div>
                            <span class="icomoon-new-24px-items-1 text-primary s3 top2 relative" rel="tooltip" title=""
                                data-original-title="Items"></span>
                            <span class="d-inline-block font18 text-primary items"> 76</span>
                        </div>
                        <span class="d-none d-md-inline-block">Items</span>
                    </button>

                    <button class="btn btn-light custom_btn outline1 filters-action px-2 px-md-4"
                        data-filter-value=".correct">
                        <div>
                            <span class="icomoon-correct text-success s3 top2 relative" rel="tooltip" title=""
                                data-original-title="Correct"></span>
                            <span class="d-inline-block font18 text-success correct"> 1</span>
                        </div>
                        <span class="d-none d-md-inline-block">
                            Correct
                        </span>
                    </button>

                    <button class="btn btn-light custom_btn outline1 filters-action px-2 px-md-4"
                        data-filter-value=".incorrect">
                        <div>
                            <span class="icomoon-incorrect text-danger mr s3 relative top2" rel="tooltip" title=""
                                data-original-title="Incorrect"></span>
                            <span class="d-inline-block font18 text-danger font18 incorrect"> 4</span>
                        </div>
                        <span class="d-none d-md-inline-block">
                            Incorrect
                        </span>
                    </button>
                    <button class="btn btn-light custom_btn outline1 filters-action px-2 px-md-4"
                        data-filter-value=".unattempted">
                        <div>
                            <span class="icomoon-eye-5 mr text-warning s3 top2 relative" rel="tooltip" title=""
                                data-original-title="Unattempted"></span>
                            <span class="d-inline-block font18 text-warning unat">71</span>
                        </div>
                        <span class="d-none d-md-inline-block">
                            Unattempted
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Question</th>
                    <th scope="col">Option</th>
                    <th scope="col">Result</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div class="bg-light border border-dark bg-darkgrey px-3 cont">
            <div class=" d-flex flex-row position-relative justify-content-around align-items-center pt-1"
                style="cursor: pointer;">

                <div class="goback d-flex flex-row">
                    <!-- <span class="  icomoon-backward-2 font18 ic text-white mr-2" style="font-size: 18px;"></span> -->
                    <small class="font18 line_height1 align-top d-lg-inline-block text-white"
                        style="font-size: 18px;">DashBoard</small>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="review.js"></script>
<script>
    $(document).ready(function () {
        $('.reviewpg').hide();
        $.ajax({
            url: "http://localhost/quiz/question.json",
            type: "POST",
            success: function (data) {
                var k = 0;
                var count = 0;
                var ncount = 0;
                var ucount = 0;




                for (k = 0; k < data.length; k++) {
                    checkat = sessionStorage.getItem("option" + k);
                    checkres = sessionStorage.getItem("result" + k);

                    $("tbody").append('<tr class=""><th scope="row" class="pb-3">' + (k + 1) + '</th><td class="snippet-an pt-3" id="s' + k + '">' + data[k]["snippet"] + '</td><td class="d-flex  align-items-center justify-content-between pt-3" style="font-weight: 700;"><p class="border-dark ' + k + 'var0 corr' +
                        k + 'li' + 0 +
                        '">A</p><p class="border-dark ' + k + 'var1 corr' +
                        k + 'li' + 1 +
                        '">B</p> <p class="border-dark ' + k + 'var2 corr' +
                        k + 'li' + 2 +
                        '">C</p><p class="border-dark ' + k + 'var3 corr' +
                        k + 'li' + 3 +
                        '">D</p></td > <td class="checkat' + k + ' pt-3"></td></tr >'
                    );

                    var snippetAnElement = document.getElementById('s' + k);
                    snippetAnElement.addEventListener('click', function (event) {
                        var clickedElementId = event.target.id;
                        navigateToNextPage(clickedElementId);
                    });

                    if ((sessionStorage.getItem("result" + k)) == (1)) {
                        $(".checkat" + k).append("Correct").addClass('text-success');
                    } else if (checkat !== null) {
                        $(".checkat" + k).append("Attempted").addClass('text-success');
                    } else {
                        $(".checkat" + k).append("Unattempted").addClass('text-danger');
                    }
                    for (i = 0; i < 4; i++) {

                        if ((sessionStorage.getItem("option" + k)) == i && JSON.parse(data[k]["content_text"]).answers[i]['is_correct'] !== '1') {
                            $('.' + k + 'var' + i).addClass('text-danger');
                        }
                        if (JSON.parse(data[k]["content_text"]).answers[i]['is_correct'] == '1' && JSON.parse(data[k]["content_text"]).answers[i]['is_correct'] !== '0') {
                            $('.corr' + k + 'li' + i).addClass('text-success');
                        }
                    }

                    if (checkres == 1) {
                        count++;

                        $('.correct').text(count);
                    }
                    if (checkres == 0) {
                        ncount++;

                        $('.incorrect').text(ncount);
                    }

                    if ($('.checkat' + k).text() == 'Unattempted') {
                        ucount++;
                    }
                    $('.unat').text(ucount)
                    $('.items').text(data.length);
                    $('.result').text(
                        (parseFloat(count / (data.length) * (100)).toFixed(2) + "%")
                    );

                    // $('.snippet-an').click(function () {
                    //     var nextPageURL = "review.php?id=" + ;
                    //     window.location.href = nextPageURL;
                    //     // console.log(k);
                    //     // $.ajax({
                    //     //     type: 'POST',
                    //     //     url: 'review.php',
                    //     //     data: { text1:k },

                    //     // });

                    // });
                    function navigateToNextPage(clickedElementId) {
                        var nextPageURL = "review.php?id=" + clickedElementId;
                        window.location.href = nextPageURL;
                    }
                }

            }, // success: function (data) ends here
        }); //.ajax() ends here
    });
</script>

</html>