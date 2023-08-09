<?php
$json_string = 'question.json';
$question = file_get_contents($json_string);
$arr = json_decode($question, true);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Prepkit Questions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.ucertify.com/layout/themes/bootstrap4/ux/css/main_sass/main.css">
    <link rel="stylesheet" href="https://www.ucertify.com/layout/themes/bootstrap4/ux/css/bootstrap4.css">
    <link rel="stylesheet" href="https://www.ucertify.com/layout/themes/bootstrap4/ux/css/uc_global.css">
    <link rel="stylesheet" href="https://www.ucertify.com/utils/?util=icomoon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .options {
        padding: 11px;
    }

    #time {
        font-family: monospace;
        x margin-top: auto;
    }

    .ic {
        position: relative;
        margin-right: 3px;
        top: 4px;
    }

    .cont {
        width: 38%;
        height: 5%;
        position: absolute;
        bottom: 10px;
        right: 50px;
    }

    .list-group {
        display: none;
        float: left;
        background: white;
        z-index: 10;
        position: absolute;
        background: white;
        z-index: 1;
        height: 700px;
        width: 40%;
        overflow: auto;
        margin-left: -5px;
    }

    @media screen and (max-width: 756px) {
        .cont {
            width: 350px;
            right: 15px;
            position: fixed;
        }

        .ic {
            top: 0px;
        }

        .list-group {
            width:420px;
        }
    }
</style>
</head>

<body>
    <?php include("./header.html") ?>
    <div class="list-group " >
        <div class="d-flex " style="top: 1px; position: relative; z-index: 5; cursor:pointer;">
            <p class="list-group-item list-group-item-action b " style="cursor:pointer;margin-top: 4px;z-index: 1;"
                id="0li">
                <button class="btn-group" style="border: none;">
                    <span class="btn  all-b btn-outline-dark" id="all-b">All</span>
                    <span class="btn  at-b  btn-outline-dark" id="at-b">Attempted</span>
                    <span class="btn ut-b   btn-outline-dark" id="ut-b">Unattempted</span>
                </button>
                
            </p>
        </div>
    </div>

    <div class="container">
        <div class="questions-n-ans my-4">
            <h6 class="question" style="z-index: -1;" id="quest">
            </h6>




        </div>
    </div>

    <form class="options container d-flex flex-column ">



    </form>
    </div>
    <div class="bg-light border border-dark bg-darkgrey px-3 cont " style="z-index: 10; position:fixed;">
        <div class="d-flex flex-row position-relative  align-items-center justify-content-around">
            <span class="icomoon-clock-6 s4 font18 text-white"></span>
            <p id="time" class="position-relative top8 text-white font18"></p>
            <!-- <button class="list-bt btn btn-light border-primary ">List</button> -->
            <button type="submit" class="list-bt btn outline2 toolbar_enter text-inherit d-flex flex-row">
                <span class=" icomoon-24px-list-2 font18 ic text-white"></span>
                <small class="font18 line_height1 align-top d-lg-inline-block text-white d-none">List</small>
            </button>
            <!-- <button class="prev btn btn-light border-dark ">Prev</button> -->
            <button type="submit" class="prev btn outline2 toolbar_enter text-inherit">
                <span class="  icomoon-backward-2 font18 ic text-white"></span>
                <small class="font18 line_height1 align-top d-lg-inline-block text-white d-none">Previous</small>
            </button>


            <p class="data position-relative top8 text-white font18"></p>
            <!-- <button class="next btn btn-light border-dark ">Next</button> -->
            <button type="submit" class="next btn outline2 toolbar_enter text-inherit">
                <small class="font18 line_height1 align-top d-lg-inline-block text-white d-none">Next</small>
                <span class=" icomoon-forward-3 font18 ic text-white"></span>
            </button>
            <!-- <button class="end btn btn-light border-dark  bg-danger text-light">End Test</button> -->
            <button type="submit" class="end btn outline2 toolbar_enter text-inherit">
                <span class=" icomoon-24px-autoplay-2 ic font18 text-white "></span>
                <small class="font18 line_height1 align-top d-lg-inline-block text-white d-none">End Test</small>
            </button>

        </div>
    </div>
    <div class="modal" tabindex="-1" style="z-index:3; ">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; ">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Confirmation</h5>
                    <button type="button" class="btn-close modclose"></button>
                </div>
                <div class="modal-body">
                <div class="text-center m-2 font-weight-bold">Are you sure you want to end the test ?</div>
                    <div class="d-flex justify-content-between">
                        <button class="btn w-25">Total <br><span class="total-item text-primary"></span>
                        </button>
                        <button class="btn w-25">Unattempt <br><span class="unattempt text-danger"></span></button>
                        <button class="btn w-25">Attempt <br><span class="attempt text-success"></span></button>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modclose btn btn-secondary"
                        style="z-index: 10!important;">Cancel</button>
                    <a href="result.php">
                        <button type="button" class="endtest btn btn-danger"
                            style="z-index: 10!important;">End</button></a>
                </div>
            </div>
        </div>
    </div>







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="script.js"></script>


</body>

</html>