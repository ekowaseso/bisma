<html>

<head>
    <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css">

    <style>
        .progressbar-title {
            position: relative;
            margin-bottom: 10px;
            background: #26c9ff;
            border-radius: 5px;
            padding: 30px 10px 30px 80px;
        }

        .progress {
            height: 10px;
            border-radius: 10px;
            box-shadow: none;
            line-height: 35px;
            margin: 0;
            background: #0ba2da;
        }

        .progress .progress-bar {
            background: #fff;
            animation: progress 6s;
        }

        .progressbar-title .progressbar-value {
            position: absolute;
            left: 15px;
            top: 14px;
            color: #fff;
            font-weight: bold;
            background: #0ba2da;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .progressbar-title.red {
            background: #ff5a4e;
        }

        .progressbar-title.red .progressbar-value,
        .progressbar-title.red .progress {
            background: #ff3330;
        }

        .progressbar-title.orange {
            background: #f17d4e;
        }

        .progressbar-title.bts {
            background: #694198;
        }

        .progressbar-title.orange .progressbar-value,
        .progressbar-title.orange .progress {
            background: #dc551d;
        }

        @-webkit-keyframes progress {
            0% {
                width: 0%;
            }
        }

        @keyframes progress {
            0% {
                width: 0%;
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">

                <h2 class="text-center" style="color:#c3c3c3">Update</h2>



                <div class="progressbar-title">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 55%;"></div>
                    </div>
                    <span class="progressbar-value">55%</span>
                </div>





            </div>
        </div>
    </div>
</body>

</html>