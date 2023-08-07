<!DOCTYPE html>
<html lang="en">

<head>
    <title>Prepkit Questions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.ucertify.com/layout/themes/bootstrap4/ux/css/bootstrap4.css">
    <link rel="stylesheet" href="https://www.ucertify.com/utils/?util=icomoon">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<!--New rel" style="margin-right: 527px;-->
<style>
    /* .start-btn {
            margin-top: 239px;
        } */

    seq:before {
        content: attr(no);
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
    .cont{
        width: 38%;
        height: 5%;
        position: absolute; 
        bottom: 10px; 
        right: 50px; 
    }

    @media screen and (max-width: 756px) {
        .cont{
            width: 350px;
            right: 15px;
            position: fixed;
        }
        .ic{
            top: 0px;
        }
        h1{
            
        }
    }
</style>
</head>

<body>
    <?php include("./header.html") ?>


    <div class="list-group w-25" style="display:none; float: left; background: white; z-index: 1; position:relative; background: white;
    z-index: 1;
    height: 610px;
    width: 215px;
    overflow: auto;
    float: left;
    position: relative;
    margin-left: -5px;">
        <div class="d-flex" style="top: 1px; position: relative; z-index: 2; cursor:pointer;">
            <p class="list-group-item list-group-item-action" style="cursor:pointer;margin-top: 4px;z-index: 1;"
                id="0li">
                <button class="btn-group" style="border: none;">
                    <span class="btn all-b text-primary btn-outline-dark" style="background-color: white;">All</span>
                    <span class="btn at-b text-success btn-outline-dark"
                        style="background-color: white;">Attempted</span>
                    <span class="btn ut-b text-warning btn-outline-dark"
                        style="background-color: white;">Unattempted</span>
                </button>

            </p>
        </div>

        <!-- <p class="list-group-item list-group-item-action li-1"></p> -->
    </div>
    <div class="container">
        <div class="questions-n-ans my-4">
            <div class=" container checkit"></div>

            <h6 class="question my-3" style="z-index: -1;" id="quest">
            </h6>
        </div>
    </div>


    <form class="container options">

    </form>

    <div class="conatiner my-4">
        <h5 class="container my-4">Explanation : </h5>
        <p class="container snippet text-dark text-justify"></p>

    </div>


    <div class="bg-light border border-dark bg-darkgrey px-3 cont">
        <div class=" d-flex flex-row position-relative justify-content-around align-items-center pt-1"
            style="cursor: pointer;">

            <div class="prev d-flex flex-row">
                <span class="  icomoon-backward-2 font18 ic text-white mr-2" style="font-size: 18px;"></span>
                <small class="font18 line_height1 align-top d-lg-inline-block text-white d-none"
                    style="font-size: 18px;">Previous</small>
            </div>
            <div class="data d-flex flex-row text-white " style="font-size: 18px;">

            </div>
            <div class="next d-flex flex-row">
                <small class="font18 line_height1 align-top d-lg-inline-block text-white mr-2 d-none"
                    style="font-size: 18px; ">Next</small>
                <span class=" icomoon-forward-3 font18 ic text-white" style="font-size: 18px; "></span>
            </div>
            <div class=" d-flex flex-row" onclick="history.back()">
                <small class="font18 line_height1 align-top d-lg-inline-block text-white mr-2"
                    style="font-size: 18px; ">Back</small>
            </div>
            <div class="goback d-flex flex-row">
                <!-- <span class="  icomoon-backward-2 font18 ic text-white mr-2" style="font-size: 18px;"></span> -->
                <small class="font18 line_height1 align-top d-lg-inline-block text-white" style="font-size: 18px;">Dash</small>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js "></script>
    <script src="review.js "></script>

</body>

</html>