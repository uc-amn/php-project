<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result</title>
    <link rel="stylesheet" href="https://ucertify.com/layout/themes/bootstrap4/ux/css/uc_global.css">
    <link rel="stylesheet" href="https://www.ucertify.com/layout/themes/bootstrap4/ux/css/main_sass/main.css">
    <link rel="stylesheet" href="https://www.ucertify.com/layout/themes/bootstrap4/ux/css/bootstrap4.css">
    <link rel="stylesheet" href="https://www.ucertify.com/utils/?util=icomoon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://www.jigyaasa.info/layout/themes/bootstrap4/ux/css/css_overwrite.min.css?20221117" type="text/css">
    <style>
        td {
            cursor: pointer;
        }
        
        .snippet {
            text-align: center;
        }
    </style>
</head>

<body>
<?php include("./header.html") ?>
    <div class="container result-page">

        <div class="row clearfix justify-content-center clearfix mb-3">
            <div class="w-auto">
                <div class="filter option-set mr-2" id="filters-action" data-filter-group="button_filter" intro-id="filter_action">
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
                            <span class="icomoon-new-24px-items-1 text-primary s3 top2 relative" rel="tooltip" title="" data-original-title="Items"></span> 
                            <span class="d-inline-block font18 text-primary items"> 76</span>
                        </div>
                        <span class="d-none d-md-inline-block">Items</span>
                    </button>
                    
                                    <button class="btn btn-light custom_btn outline1 filters-action px-2 px-md-4" data-filter-value=".correct">
                            <div>
                                <span class="icomoon-correct text-success s3 top2 relative" rel="tooltip" title="" data-original-title="Correct"></span>
                                <span class="d-inline-block font18 text-success correct"> 1</span>
                            </div>
                            <span class="d-none d-md-inline-block">
                                Correct
                            </span>
                        </button>
                           
                        <button class="btn btn-light custom_btn outline1 filters-action px-2 px-md-4" data-filter-value=".incorrect">
                            <div>
                                <span class="icomoon-incorrect text-danger mr s3 relative top2" rel="tooltip" title="" data-original-title="Incorrect"></span>
                                <span class="d-inline-block font18 text-danger font18 incorrect"> 4</span>
                            </div>
                            <span class="d-none d-md-inline-block">
                                Incorrect
                            </span>
                        </button> 
                        <button class="btn btn-light custom_btn outline1 filters-action px-2 px-md-4" data-filter-value=".unattempted">
                            <div>
                                <span class="icomoon-eye-5 mr text-warning s3 top2 relative" rel="tooltip" title="" data-original-title="Unattempted"></span>
                                <span class="d-inline-block font18 text-warning unat">71</span>
                            </div>
                            <span class="d-none d-md-inline-block">
                                Unattempted
                            </span>
                        </button>
                            </div>
            </div>
        </div>

        <table class="table table-striped">
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
    </div>
    <br>
    <br>
    <br>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="review.js"></script>
<script>
    $(document).ready(function() {
        $('.reviewpg').hide();
        $.ajax({
            url: "http://localhost/quiz/question.json",
            type: "POST",
            success: function(data) {
                var k = 0;
                var count = 0;
                var ncount = 0;
                var ucount = 0;




                for (k = 0; k < data.length; k++) {
                    checkat = sessionStorage.getItem("option" + k);
                    checkres = sessionStorage.getItem("result" + k);

                    $("tbody").append('<tr><th scope="row" class="snippet">' + (k + 1) + '</th><td class="snippet-an" id="s' + k + '">' + data[k]["snippet"] + '</td><td class="d-flex justify-content-between" style="font-weight: 700;"><p class="border-dark ' + k + 'var0 corr' +
                        k + 'li' + 0 +
                        '">A</p><p class="border-dark ' + k + 'var1 corr' +
                        k + 'li' + 1 +
                        '">B</p> <p class="border-dark ' + k + 'var2 corr' +
                        k + 'li' + 2 +
                        '">C</p><p class="border-dark ' + k + 'var3 corr' +
                        k + 'li' + 3 +
                        '">D</p></td > <td class="checkat' + k + '"></td></tr >'
                    );


                    if ((sessionStorage.getItem("result" + k)) == (1)) {
                        $(".checkat" + k).append("Correct").addClass('text-success');
                    } else if (checkat !== null) {
                        $(".checkat" + k).append("Attempted").addClass('text-success');
                    } else {
                        $(".checkat" + k).append("Unattempted").addClass('text-danger');
                    }
                    for (i = 0; i < 4; i++) {

                        if ((sessionStorage.getItem("option" + k)) == i) {
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

                    $('.snippet-an').click(function() {

                        window.location.href = 'review.php';

                    });
                }

            }, // success: function (data) ends here
        }); //.ajax() ends here
    });
</script>

</html>