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
.dir-rtl{
	direction:rtl !important;
}
.dir-ltr{
	direction:ltr !important;
}
.float-r{
	float:right !important;
}
.float-l{
	float:left !important;
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
                        <span>{{ __('titles.page_no') }} : {PAGENO} / {nbpg}</span>
                    </div>
                    <div class="report-header">
                        <span>
                            <div class="date">
                                <span>{{ __('titles.date') }} : {{$Today}}</span>
                            </div>
                            <div class="date">
                                <span dir="rtl">{{ __('titles.user_name') }}: {{$User->user_name}}</span>
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
                                <span >{{ __('titles.tax_card') }}: {{$Company->tax_card}}</span><br>
                                <span >{{ __('titles.registeration_no') }} : {{$Company->registeration_no}}</span><br>
                                <span >{{ __('titles.commercial_register') }} : {{$Company->commercial_register}}</span>
                            </div>
                        </span>
                    </div> --}}

                    {{-- <div  class="company">
                        <span>
                            
                            <div class="off_name">
                                <span>
                                {{$Company->company_official_name}}
                                </span>
                            </div>
                            <div class="name">
                                <span>{{ __('titles.company') }}:</span>
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

@foreach ($Cashes as $i => $Cash)
<div class="rep_name">
    <span >{{ __('titles.permission_no') }} : {{$Cash->cash_receipt_note}}</span>
</div><br><br><br>


<div style="float:left;text-align: left;font-size:12px;padding:10px;direction:ltr; width:50%;">
    <span >{{ __('titles.recieved_from') }}  : {{$Cash->person_name}}</span><br>
    <span> {{ __('titles.date') }} : {{date('d-m-Y', strtotime($Cash->cash_date))}}</span>
</div>
<div class="left" style="float: left;width:20%;">
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                {{$Cash->cash_amount}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.mony_amount') }} </span>
            </div>
        </span>
    </div>
</div>
<div style="clear: both;"></div>
<hr>
<div class="right">
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                    @php
                        $amount = $Cash->cash_amount;
                        $strAmount = Alkoumi\LaravelArabicTafqeet\Tafqeet::inArabic($amount,'egp');
                    @endphp
                    {{$strAmount}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.mony_amount') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                    {{$Cash->statement}}
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.mony_amount') }} </span>
            </div>
        </span>
    </div>
</div>
<div style="clear: both;"></div><hr>
<div class="right">
    <div  class="company">
        <span>
          
            <div class="off_name">
                <span>
                    .................................................................................
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.reciver_name') }} </span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                    .................................................................................
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.id_no') }}</span>
            </div>
        </span>
    </div>
    <div  class="company">
        <span>
            
            <div class="off_name">
                <span>
                    .................................................................................
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.signature') }} </span>
            </div>
        </span>
    </div>
</div>
<div style="clear: both;"></div>
<div class="left" style="float: left;">
    <div  class="company">
        <span>
           
            <div class="off_name">
                <span>
                ..............................
                </span>
            </div>
            <div class="name">
                <span>{{ __('titles.confirming') }}</span>
            </div>
        </span>
    </div>
</div><br>

@if ($i != count($Cashes) - 1)
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

@endif
@endforeach
</body>
</html>
