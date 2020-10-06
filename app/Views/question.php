<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/survei/websafe.css">
    <link rel="stylesheet" type="text/css" href="css/survei/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/survei/survey.css">
    <link rel="stylesheet" type="text/css" href="css/survei/template-core.css">
    <link rel="stylesheet" type="text/css" href="css/survei/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/survei/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="css/survei/yiistrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/survei/noto.css">
    <link rel="stylesheet" type="text/css" href="css/survei/ajaxify.css">
    <link rel="stylesheet" type="text/css" href="css/survei/css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/survei/variations/sea_green.css">
    <link rel="stylesheet" type="text/css" href="css/survei/css/theme.css">
    <link rel="stylesheet" type="text/css" href="css/survei/custom.css">
    <link rel="stylesheet" type="text/css" href="css/survei/lime-progress.css">
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript">
        window.debugState = {
            frontend: (0 === 1),
            backend: (0 === 1)
        };
    </script>
    <script type="text/javascript" src="js/survei/jquery-3.4.1.min.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/jquery-migrate-3.1.0.min.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/lslog.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/pjax.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/moment-with-locales.min.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/survey.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/template-core.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/bootstrap.min.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/bootstrapconfirm.min.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/theme.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/custom.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/ajaxify.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/survey_runtime.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/em_javascript.js" class="headScriptTag"></script>
    <script type="text/javascript" src="js/survei/nojs.js" class="headScriptTag"></script>
    <script type="text/javascript">
        /*<![CDATA[*/
        LSvar = {
            "bFixNumAuto": 1,
            "bNumRealValue": 0,
            "sLEMradix": ".",
            "lang": {
                "confirm": {
                    "confirm_cancel": "Batal",
                    "confirm_ok": "Oke"
                }
            },
            "showpopup": 1,
            "startPopups": {},
            "debugMode": 0
        };
        LSvar = LSvar || {};
        /*]]>*/
    </script>

</head>

<body style="padding-top: 90px;" class=" fruity vanilla font-lucida_sans lang-id  brand-logo">

    <div id="beginScripts" class="script-container">
        <script type="text/javascript" src="js/survei/decimal.js"></script>
        <script type="text/javascript" src="js/survei/decimalcustom.js"></script>
        <script type="text/javascript">
            /*<![CDATA[*/
            setJsVar();
            var LEMmode = 'group';
            var LEMgseq = -1;
            ExprMgr_process_relevance_and_tailoring = function(evt_type, sgqa, type) {
                if (typeof LEM_initialized == 'undefined') {
                    LEM_initialized = true;
                    LEMsetTabIndexes();
                }
                if (evt_type == 'onchange' && (typeof last_sgqa !== 'undefined' && sgqa == last_sgqa) && (typeof last_evt_type !== 'undefined' && last_evt_type == 'TAB' && type != 'checkbox')) {
                    last_evt_type = 'onchange';
                    last_sgqa = sgqa;
                    return;
                }
                last_evt_type = evt_type;
                last_sgqa = sgqa;

            }

            /*]]>*/
        </script>

    </div>


    <article>

        <div id="dynamicReloadContainer">


            <!-- Bootstrap Navigation Bar -->
            <div class=" navbar navbar-default navbar-fixed-top">
                <div class=" navbar-header   ">
                    <button type="button" class=" navbar-toggle collapsed " data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <img class="logo img-responsive" style="margin-left: 20px; height: 60px;" src="<?= BASE_URL('img/Inshot Logo.png') ?>" alt="SURVEI KUALITAS LAYANAN IT SUPPORT">
                </div>
                <div id="navbar" class=" collapse navbar-collapse ">
                    <ul class=" nav navbar-nav  navbar-action-link  navbar-right">
                        <!-- Load unfinished survey button -->
                        <li class=" ls-no-js-hidden ">
                            <a href="#" data-limesurvey-submit="{ &quot;loadall&quot;:&quot;loadall&quot; }" class=" ls-link-action ls-link-loadall  animate">
                                Memuat survey yang belum selesai
                            </a>
                        </li>
                    </ul>
                </div>
            </div>



            <!-- Top container -->
            <div class=" top-container  space-col">
                <div class="  container-fluid">

                    <div class="progress">
                        <div class=" progress-bar " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: 0%;">
                            0%
                        </div>
                    </div>
                </div> <!-- must hide it without javascript -->
            </div>


            <!-- Outer Frame Container -->
            <!-- outer frame container -->
            <div class=" outerframe    container  " id="outerframeContainer">

                <!-- Main Row -->
                <div id="main-row">
                    <!-- Main Col -->
                    <div class="  col-centered  space-col" id="main-col">
                        <!-- Start of the main Form-->
                        <form id="limesurvey" name="limesurvey" autocomplete="off" class="survey-form-container form" action="<?= base_url() ?>" method="post">
                            <input type="hidden" value="RnVVSFBJcGk5OGFQYjB5ZndGMmxCM2dBSlNCUXh2RTlsMeRq_klYaYU6zDTP_fCBUHO8m0UyivjGIl0OyiXc3Q==" name="YII_CSRF_TOKEN">

                            <!-- Ajax value -->
                            <!-- Needs to be set by javascript! Because if JavaScript is disabled, ajaxmode will completely fail! -->



                            <!-- Field Names -->
                            <input type="hidden" name="fieldnames" value="" id="fieldnames">



                            <!-- Submit button -->
                            <button type="submit" id="defaultbtn" value="default" name="move" class="submit hidden" style="display:none">standar</button>
                            <!-- main form -->

                            <input type="hidden" name="sid" value="731349" id="sid">
                            <input type="hidden" name="lastgroupname" value="_WELCOME_SCREEN_" id="lastgroupname">
                            <input type="hidden" name="LEMpostKey" value="2085429909" id="LEMpostKey">
                            <input type="hidden" name="thisstep" id="thisstep" value="0">

                            <script type="text/javascript">
                                var LEMmode = 'group';
                                var LEMgseq = -1;
                                ExprMgr_process_relevance_and_tailoring = function(evt_type, sgqa, type) {
                                    if (typeof LEM_initialized == 'undefined') {
                                        LEM_initialized = true;
                                        LEMsetTabIndexes();
                                    }
                                    if (evt_type == 'onchange' && (typeof last_sgqa !== 'undefined' && sgqa == last_sgqa) && (typeof last_evt_type !== 'undefined' && last_evt_type == 'TAB' && type != 'checkbox')) {
                                        last_evt_type = 'onchange';
                                        last_sgqa = sgqa;
                                        return;
                                    }
                                    last_evt_type = evt_type;
                                    last_sgqa = sgqa;

                                }
                                //
                            </script>
                            <input type="hidden" id="aQuestionsWithDependencies" data-qids="[]">



                            <!-- No JavaScript alert -->
                            <!-- <div class=" ls-js-hidden warningjs  alert alert-danger " data-type="checkjavascript">
                                Caution: JavaScript execution is disabled in your browser or for this website. You may not be able to answer all questions in this survey. Please, verify your browser parameters.
                            </div> -->

                            <!-- Welcome Message -->
                            <div id="welcome-container" class="">

                                <!-- Survey Name -->
                                <h1 class=" survey-name  text-center">
                                    SURVEI KUALITAS LAYANAN IT SUPPORT
                                </h1>

                                <!-- Survey description -->
                                <div class=" survey-description  text-info text-center">

                                </div>

                                <!-- Welcome text -->
                                <div class=" survey-welcome  h4 text-primary">

                                </div>

                                <!-- Question count -->
                                <div class=" number-of-questions   text-muted">
                                    <div class=" question-count-text ">

                                        There are 11 questions in this survey.
                                    </div>
                                </div>
                            </div>




                            <!-- Privacy message -->

                            <div class=" privacy  row">
                                <div class="   col-sm-12 col-centered">
                                </div>
                            </div>




                            <!-- PRESENT THE NAVIGATOR -->
                            <div class="row navigator space-col" id="navigator-container">

                                <!-- Previous button container -->
                                <div class="col-xs-6 text-left">

                                </div>
                                <div class="col-xs-6 text-right">
                                    <!-- Button Next -->
                                    <button id="ls-button-submit" type="submit" value="movenext" name="move" accesskey="n" class="   ls-move-btn ls-move-next-btn ls-move-submit-btn action--ls-button-submit  btn btn-lg btn-primary ">
                                        Berikutnya
                                    </button>
                                </div>
                            </div>
                            <!-- Extra navigator part -->
                            <!-- extra tools, can be shown with javascript too (just remove ls-js-hidden class -->
                           

                            <input type="hidden" name="ajax" value="off" id="ajax">
                        </form> <!-- main form -->
                    </div> <!-- main col -->
                </div> <!-- main row -->
            </div>

            <!-- Bootstrap Modal Alert -->
            <div id="bootstrap-alert-box-modal" class=" modal fade ">
                <div class=" modal-dialog ">
                    <div class=" modal-content ">
                        <div class=" modal-header " style="min-height:40px;">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class=" close ">×</button>
                            <div class=" modal-title h4 ">&nbsp;</div>
                        </div>
                        <div class=" modal-body ">
                        </div>
                        <div class=" modal-footer ">
                            <a href="#" data-dismiss="modal" class=" btn btn-default ">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <div id="bottomScripts" class="script-container">
        <script type="text/javascript">
            /*<![CDATA[*/

            try {
                triggerEmClassChange();
            } catch (e) {
                console.ls.warn('triggerEmClassChange could not be run. Is survey.js correctly loaded?');
            }


            if (window.basicThemeScripts === undefined) {
                window.basicThemeScripts = new ThemeScripts();
            }
            basicThemeScripts.initGlobal();

            triggerEmRelevance();
            jQuery(document).off('pjax:scriptcomplete.mainBottom').on('ready pjax:scriptcomplete.mainBottom', function() {
                activateActionLink();
                activateConfirmButton();

                $('td.radio-item > input[type=radio]').on('click', function() {
                    if ($(this).val() != '') {
                        $(this).closest('tr.radio-list').addClass('selected');
                    } else {
                        $(this).closest('tr.radio-list').removeClass('selected');
                    }
                })

                basicThemeScripts.initTopMenuLanguageChanger('.ls-language-link ', 'form#limesurvey');

                $('#limesurvey').append('<input type="hidden" name="ajax" value="off" id="ajax" />');


                if (window.basicThemeScripts === undefined) {
                    window.basicThemeScripts = new ThemeScripts();
                }
                basicThemeScripts.initWelcomePage();

                updateMandatoryErrorClass();
            });
            /*]]>*/
        </script>

    </div>

    <script>
        window.basicThemeScripts.init();
    </script>

</body>

</html>