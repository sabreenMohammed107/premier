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
html,body,.body{
    box-sizing: border-box;
}
.body-page{
    padding: 35px 0 0;
    direction: ltr;
    /* background: #ddd; */
    width: 100%;
}
.header{
    padding: 25px 10px;
    width: 20%;
    font-size: 10px;
    text-align: center;
    background: #021625;
    color: #fff;
}
.footer{
    padding: 5px 10px;
    width: 20%;
    font-size: 10px;
    text-align: center;
    background: #021625;
    color: #fff;
}
.report-header{
    float: left;
    width: 50%;
    display: inline-block;
}
.date{
    padding: 10px;
    width: 30%;
    font-size: 12px;
    text-align: center;
    background: #021625;
    color: #fff;
    margin: 10px 0;
}
.image{
    width: 33.3%;
    float: right;
    padding: 5px 50px 30px 10px;
    /* background: #021625; */
}
.company{
    width: 100%;
    /* background: #255; */
}
.name{
    background-color: #cecece;
    padding: 10px;
    margin: 10px;
    width: 95px;
    font-size: 12px;
    float: right;
}
.off_name{
    padding: 10 20px;
    float: right;
    width: 180px;
}
.rep_name{
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
.right{
    margin: 280px 0 0 0;
}
.right, .left{
    float: right;
    width:50%;
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
                    </div><br>
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
@foreach ($Cashes as $i => $Cash)
<div class="right">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>التاريخ :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->cash_date}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>البيان :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->statement}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>اسم العميل :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->person_name}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>رقم الاذن :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->cash_receipt_note}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>التوجيه المحاسبي :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->guided_item_name ?? 'لم يتم'}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>الاعتماد المحاسبي :</span>
            </div>
            <div class="off_name">
                <span>
                    @if ($Cash->confirm == 1)
                        معتمد
                    @else
                        غير معتمد
                    @endif
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>ملاحظات :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->notes}}
                </span>
            </div>
        </span>
    </div>
</div>
<div class="left">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>مقبوض معتمد :</span>
            </div>
            <div class="off_name">
                <span>
                    @if ($Cash->approved == 1)
                        معتمد
                    @else
                    غير معتمد
                    @endif

                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>نوع الشخص :</span>
            </div>
            <div class="off_name">
                <span>
                    @if (!empty($Cash->person_id))
                        {{$Cash->person_type_name}}
                    @else
                        غير مسجل
                    @endif
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>مصدر الاموال :</span>
            </div>
            <div class="off_name">
                <span>
                    @if ($Cash->fund_source == 0)
                        خزينة
                    @else
                        بنك
                    @endif
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>صافي قيمة الفاتورة :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->cash_amount}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>المعيار التفصيلي :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cash->detailed_criterion}}
                </span>
            </div>
        </span>
    </div>
</div>
@if ($i != count($Cashes) - 1)
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

@endif
@endforeach
</body>
</html>
