<!DOCTYPE html>
<html lang="en">
    @php
    $imgPathBack = public_path('site/imgs/card/back.png');
    $imgBack = base64_encode(file_get_contents($imgPathBack));

    $imgPathFront = public_path('site/imgs/card/front.png');
    $imgFront = base64_encode(file_get_contents($imgPathFront));

    $parsonalImagePath = public_path('/'.$image);
    $parsonalImage = base64_encode(file_get_contents($parsonalImagePath));

    // $font = public_path('site/imgs/card/Kufam-Regular');
    // dd(storage_path('fonts/Kufam-Regular.ttf'));

@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Document</title>
    <style>
        @font-face { 
            font-family: "Kufam-Regular.ttf";
            src: url("fonts/Kufam-Regular.ttf");
        }
        * {
            -webkit-print-color-adjust: exact !important;
            /* Chrome, Safari, Edge */
            color-adjust: exact !important;
            /*Firefox*/
              /* font-family: 'Kufam', sans-serif !important; */
        }

        body {
            position: relative;
            padding-top: 50px;
            /* font-family: "Kufam-Regular.ttf" !important; */
            /* font-family: 'Kufam', sans-serif !important; */
            font-family: 'Kufam', sans-serif;
        }

        .card {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            display: block;
            padding: 20px;
            border-radius: 20px;
            text-align: center
        }

        .front {
            width: 300px;
            height: 525px;
            display: inline-block;
            border-radius: 15px;
            margin-left: 4%;
            margin-right: 4%;
            padding: 20px;
            /* background-image: url('{{ asset('site/imgs/card/front.png') }}'); */
            background-image: url("data:image/png;base64, {{ $imgFront }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            clear: both;
            border: 1px solid #ccc;
            overflow: hidden;
        }

        .back {
            width: 300px;
            overflow: hidden;
            height: 525px;
            display: inline-block;
            border-radius: 15px;
            margin-left: 4%;
            margin-right: 4%;
            padding: 20px;
            /* background-image: url('{{ asset('site/imgs/card/back.png') }}'); */
            background-image: url("data:image/png;base64, {{ $imgBack }}");
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            clear: both;
            border: 1px solid #ccc;


        }

        img.person {
            height: 146px;
            width: 116px;
            border-radius: 10px;
            margin-top: 125px;
            margin-bottom: 15px;
            object-fit: cover;
        }

        h2 {
            font-size: 18px;
            margin-top: 0px;
            margin-bottom: 15px;
            color: #533F37;
        }

        h2.en {
            margin-bottom: 30px
        }

        h3 {
            font-size: 17px;
            font-weight: 400;
            text-align: right;
            margin-right: 35px
        }

        span {
            margin-right: 60px !important;
        }

        h3 i {
            font-style: normal;
            min-width: 70px;
            display: inline-block;
            float: right;
        }

        @media only screen and (max-width : 776px) {
            body {
                overflow-x: hidden;
            }

            .front,
            .back {
                margin-top: 25px;
                margin-bottom: 25px;
                margin-right: auto;
                margin-left: auto;
                display: block;
                width: 100%
            }

        }
        .one {
            width: 50%;display: inline-block; float: right;  font-size: 20px;
        }

        .membership-type{
            margin-top: 260px;
        }

     

    </style>


</head>

<body style="font-family: 'Kufam', sans-serif;">

    <section>
        <div class="card">
            <div class="front">
                <img src="data:image/{{ $image_extension }};base64,{{ $parsonalImage }}" class="person" alt="">
                <h2>{{ $full_name }}</h2>
                <h2 class="en">{{ $full_name_en }}</h2>
               

                <h3> 
                    <div class="one"><i>رقم العضوية</i></div>
                    <div class="one"><span>{{ $membership_no }} </span></div>
                     
                </h3> 

                <h3> 
                    <div class="one"><i>تاريخ الانتهاء</i></div>
                    <div class="one"><span>{{ $expirted_at }} </span></div>
                     
                </h3>
               



            </div>
            <div class="back">
            <h3 class="membership-type"> 
               
               <div class="one"><i>نوع العضوية</i></div>
               <div class="one"><i> <span> {{ $membership_type}}</span></div>

    		</h3>
            </div>
        </div>
    </section>
</body>

</html>