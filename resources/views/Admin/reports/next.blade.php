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
    width: 100%;
    text-align: center;
    clear: both;
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
    margin: 250px 0;
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
    @foreach($trans as $rows)


<div class="left">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span> الفتره من :</span>
            </div>
            <div class="off_name">
                <span>
                    {{$from_date}}
                </span>
            </div>
        </span>
    </div>

    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span> الفترة الى :</span>
            </div>
            <div class="off_name">
                <span>
                    {{$to_date}}
                </span>
            </div>
        </span>
    </div>
</div>
<div class="right">


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
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>اسم العميل :</span>
            </div>
            <div class="off_name">
                <span>
                    {{$rows->client_id}}
                </span>
            </div>
        </span>
    </div>
</div>
<div dir="rtl" class="rightTable">
    <table id="courseEval" style="width: 100%" border="1" class="dattable table table-striped thead-dark  ">
        <thead>
            <tr>

                <th> تاريخ المعاملة </th>
                <th>رقم الإذن</th>
                <th>رقم الفاتورة</th>
                <th>مدين</th>
                <th> دائن</th>
                <th>نوع الحركة</th>
                <th>البيان</th>
                <th>الرصيد الحالى
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows->trans as $row)
            <tr>

                <td> {{date('d-m-Y', strtotime($row->cash_date))}}</td>
                <td> {{$row->permission_code}}</td>
                <td> {{$row->invoice_no}}</td>
                <td> {{$row->additive}}</td>
                <td> {{$row->subtractive}}</td>
                <td> {{$row->type->transaction_type??''}}</td>
                <td> {{$row->purch_sales_statement}}</td>
                <?php
                $currentBalance = App\Models\FinanTransaction::where('person_id', $row->person_id)->sum('additive') - App\Models\FinanTransaction::where('person_id', $row->person_id)->sum('subtractive');
                ?>
                <td> {{$currentBalance}}</td>
            </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endforeach
</body>
</html>