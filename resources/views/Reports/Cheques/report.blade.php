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
    margin-top:220px;
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
    float: left;
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
    float: right;
    width: 40%;
    display: inline-block;
}
.date{
    float: right;
    padding: 10px;
    width: 40%;
    font-size: 12px;
    text-align: center;
}
.image{
    width: 40%;
    text-align: left;
    float: left;
    padding: 0px 50px 10px 10px;
}
.company{
    width: 100%;
    font-size: 12px;
    /* background: #255; */
}
.name{
    background-color: #cecece;
    padding: 5px;
    margin: 3px;
    width: 95px;
    height:25px ;
    float: right;
}
.off_name{
    padding: 10 20px;
    float: right;
    width: 280px;
}
.rep_name{
    padding: 10px;
    display: inline-block;
    width: 200px;
    float: left;
    font-size: 16px;
    text-align: center;
    margin: 10px auto 0px;
    background: #021625;
    color: #fff;
    clear: both;
}
.right{
    margin: 10px 0 20px;
}
.right{
    float: right;
    width:80%;
}
.left{
    float: right;
    width:20%;
    text-align: center;
}
.left .name,.left .off_name{
    width: 100%;
}
table{
    direction: rtl;
}
table{
    border:none;
    background-color: #021625;
    color: #fff;
}
tbody tr{
    background: #eee;
}
tbody tr td{
    color: #000;
}
table,th,tr,td{
    border:none;
    outline: none;
    border-color: #fff;
}
th{
    color: #fff;
    font-size: 12px;
    padding: 10px;
}
td{
    font-size: 16px;
    padding: 10px 8px;
    border-bottom: #021625 solid 1px;
}
.header-head{
    text-align: center;
    background-color:#eee;
    color: #021625;
    /* border-radius: 20px; */
    padding: 10px 5px;
    font-size: 12px;
    width: 30%;
    float: left;

}

    </style>
</head>
<body>
    <hr>
    <div class="body" style="margin-bottom:-35px;">
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
                    <div style="clear: both;"></div>
                    <br>
                    <div class="image" dir="rtl">
                        <span><img height="75" style="text-align: right;" src="{{public_path('/uploads/companies/'.$Logo)}}" /></span>
                    </div>
                    <div style="background-color:#eee;color:#222;float:right;width:30%;padding:10px 5px;text-align:center;">{{$Company->company_official_name}}</div>
                    {{-- <div class="header-head">
                        <span>
                            <div class="data">
                                <span dir="rtl">م.ض : {{$Company->tax_card}}</span><br>
                                <span dir="rtl">ض.م : {{$Company->registeration_no}}</span><br>
                                <span dir="rtl">س.ت : {{$Company->commercial_register}}</span>
                            </div>
                        </span>
                    </div> --}}

                    {{-- <div dir="rtl" class="company">
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
                    </div> --}}

                </htmlpageheader>

                <htmlpagefooter name="page-footer">
                    <div class="footer">
                        <span>{{$Title}}</span>
                    </div>
                </htmlpagefooter>
            </div>
        </span>
    </div>

@foreach ($Cheques as $i => $Cheque)
<div class="rep_name">
    @if ($Cheque->trans_type == 1)
    <span dir="rtl">اذن استلام شيك : {{$Cheque->cheque_no}}</span>
    @else
    <span dir="rtl">اذن صرف شيك : {{$Cheque->cheque_no}}</span>
    @endif

</div><br><br><br>
<div style="float:right;text-align: right;font-size:12px;background-color: #eee;padding:10px;direction:rtl; width:70%;">
    @if ($Cheque->trans_type == 1)
    <span dir="rtl">استلمنا من : {{$Cheque->person_name}}</span><br>
    @else
    <span dir="rtl">يصرف الى : {{$Cheque->person_name}}</span><br>
    @endif
    <span dir="rtl">تحريرا في : {{date('d-m-Y', strtotime($Cheque->transaction_date))}}</span>
</div>
<div class="left" style="float: left;">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>المبلغ</span>
            </div>
            <div class="off_name">
                <span>
                {{$Cheque->amount}}جم
                </span>
            </div>
        </span>
    </div>
</div>
<div style="clear: both;"></div>
<hr>
<div class="right" style="width: 100%;">
    <div dir="rtl" class="company">
        <span>
            <div class="name" style="font-size: 14px;">
                <span>مبلغ و قدرة :</span>
            </div>
            <div class="off_name" style="font-size: 14px;">
                <span>
                    @php
                        $amount = $Cheque->amount;
                        $strAmount = Alkoumi\LaravelArabicTafqeet\Tafqeet::inArabic($amount,'egp');
                    @endphp
                    {{$strAmount}}
                </span>
            </div>
        </span>
    </div>
</div>
<div class="right">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>اسم البنك :</span>
            </div>
            <div class="off_name">
                <span>
                    {{$Cheque->bank_name}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>رقم الشيك :</span>
            </div>
            <div class="off_name">
                <span>
                    {{$Cheque->cheque_no}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>و ذلك قيمة :</span>
            </div>
            <div class="off_name">
                <span>
                    {{$Cheque->notes}}
                </span>
            </div>
        </span>
    </div>
</div>
<div class="left" style="float: left;">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>تاريخ الشيك</span>
            </div>
            <div class="off_name">
                <span>
                    {{date('d-m-Y', strtotime($Cheque->transaction_date))}}
                </span>
            </div>
        </span>
    </div>
</div>
<div style="clear: both;"></div><hr>
<div class="right">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>اسم المستلم :</span>
            </div>
            <div class="off_name">
                <span>
                    .................................................................................
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>بطاقة ش \ ع رقم :</span>
            </div>
            <div class="off_name">
                <span>
                    .................................................................................
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>التوقيع :</span>
            </div>
            <div class="off_name">
                <span>
                    .................................................................................
                </span>
            </div>
        </span>
    </div>
</div>
<div style="clear: both;"></div>
<div class="left" style="float: left;">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>يعتمد</span>
            </div>
            <div class="off_name">
                <span>
                ..............................
                </span>
            </div>
        </span>
    </div>
</div><br>

@if ($i != count($Cheques) - 1)
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

@endif
@endforeach
</body>
</html>
