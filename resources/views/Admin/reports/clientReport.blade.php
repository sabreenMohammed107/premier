<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$Title}}</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        html,
        body,
        .body {
            box-sizing: border-box;
        }

        .body-page {
            padding: 35px 0 0;
            direction: ltr;
            /* background: #ddd; */
            width: 100%;
        }

        .header {
            padding: 25px 10px;
            width: 20%;
            font-size: 10px;
            text-align: center;
            background: #021625;
            color: #fff;
            float: left;
        }

        .footer {
            padding: 5px 10px;
            width: 20%;
            font-size: 10px;
            text-align: center;
            background: #021625;
            color: #fff;
        }

        .report-header {
            float: right;
            width: 40%;
            display: inline-block;
        }

        .date {
            float: right;
            padding: 10px;
            width: 40%;
            font-size: 12px;
            text-align: center;
        }

        .image {
            width: 100%;
            text-align: center;
            clear: both;
            padding: 5px 50px 30px 10px;

            /* background: #021625; */
        }

        .company {
            width: 100%;
            /* background: #255; */
        }

        .name {
            background-color: #cecece;
            padding: 10px;
            margin: 10px;
            width: 95px;
            font-size: 12px;
            float: right;
        }

        .off_name {
            padding: 10 20px;
            float: right;
            width: 180px;
        }

        .rep_name {
            padding: 10px;
            display: inline-block;
            width: 200px;
            float: left;
            font-size: 12px;
            text-align: center;
            margin: 10px auto;
            background: #021625;
            color: #fff;
            clear: both;
        }

        .right {
            margin: 250px 0;
        }

        .right,
        .left {
            float: right;
            width: 50%;
        }
    </style>
</head>

<body>
    <hr>
    <div class="body">
        <span>
            <div class="body-page">


                <htmlpageheader name="page-header">
                    <div class="header">
                        <span>الصفحة رقم : {PAGENO} / {nbpg}</span>
                    </div>
                    <div class="report-header">
                        <span>
                            <div class="date">
                                <span>التاريخ : {{$Today}}</span>
                            </div>
                            <div class="date">
                                <span dir="rtl">اسم المستخدم : {{$User->user_name}}</span>
                            </div>
                        </span>
                    </div>
                    <br>
                    <div class="image" dir="rtl">
                        <span><img height="100" style="text-align: right;" src="{{public_path('/uploads/companies/'.$Logo)}}" /></span>
                    </div>
                    <div class="rep_name">
                        <span>{{$Title}}</span>
                    </div><br><br>
                    <div dir="rtl" class="company">
                        <span>
                            <div class="name">
                                <span>اسم الشركة :</span>
                            </div>
                            <div class="off_name">
                                <span>
                                    {{$Company->company_official_name}}
                                </span>
                            </div>
                        </span>
                    </div>

                </htmlpageheader>

                <htmlpagefooter name="page-footer">
                    <div class="footer">
                        <span>{{$Title}}</span>
                    </div>
                </htmlpagefooter>
            </div>
        </span>
    </div>
    @foreach ($trans as $i => $row)
    <div class="right">
        <div dir="rtl" class="company">
            <span>
                <div class="name">
                    <span>التاريخ :</span>
                </div>
                <div class="off_name">
                    <span>
                        {{date('d-m-Y', strtotime($row->transaction_date))}}
                    </span>
                </div>
            </span>
        </div>
      
        <div dir="rtl" class="company">
            <span>
                <div class="name">
                    <span>اسم :</span>
                </div>
                <div class="off_name">
                    <span>
                        {{$row->person_name}}
                    </span>
                </div>
            </span>
        </div>
        <div dir="rtl" class="company">
            <span>
                <div class="name">
                    <span> دائن :</span>
                </div>
                <div class="off_name">
                    <span>
                        {{$row->additive}}
                    </span>
                </div>
            </span>
        </div>
        <div dir="rtl" class="company">
            <span>
                <div class="name">
                    <span> مدين :</span>
                </div>
                <div class="off_name">
                    <span>
                        {{$row->subtractive}}
                    </span>
                </div>
            </span>
        </div>
     
    </div>
    @if ($i != count($trans) - 1)
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <hr>

    @endif
    @endforeach
</body>

</html>