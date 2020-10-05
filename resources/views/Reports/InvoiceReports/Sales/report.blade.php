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
    text-align: right;
    float: right;
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
    width: 180px;
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
.right, .left{
    float: right;
    width:50%;
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
                    <div style="background-color:#021625;color:#fff;float:left;width:30%;padding:10px 5px;text-align:center;">{{$Company->company_official_name}}</div>
                    <div class="header-head">
                        <span>
                            <div class="data">
                                <span dir="rtl">م.ض : {{$Company->tax_card}}</span><br>
                                <span dir="rtl">ض.م : {{$Company->registeration_no}}</span><br>
                                <span dir="rtl">س.ت : {{$Company->commercial_register}}</span>
                            </div>
                        </span>
                    </div>

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

@foreach ($Invoices as $i => $Invoice)
<div class="rep_name">
    <span dir="rtl">فاتورة مبيعات رقم : {{$Invoice->invoice_no}}</span>
</div><br><br><br>
<div style="text-align: right;font-size:12px;background-color: #eee;padding:10px;direction:rtl; width:40%;">
    <span dir="rtl">المطلوب من السيد / {{$Invoice->person_name}}</span><br>
    <span dir="rtl">تحريرا في : {{date('d-m-Y', strtotime($Invoice->inv_date))}}</span>
</div>
<div class="right">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>نوع الخدمة :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Invoice->service_type ?? 'لم يتم'}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>اجمالي الاصناف :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Invoice->total_items_price}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>الاجمالي بعد الخصومات :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Invoice->total_price_post_discounts}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>اجمالي ضريبة ارباح تجارية و صناعية :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Invoice->total_comm_industr_tax}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>اجمالي القيمة المضافة :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Invoice->total_vat}}
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
                    {{$Invoice->notes}}
                </span>
            </div>
        </span>
    </div>
</div>
<div class="left">
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>معتمد :</span>
            </div>
            <div class="off_name">
                <span>
                    @if ($Invoice->approved == 1)
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
                {{$Invoice->person_type_name}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>نوع المصروف :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Invoice->outgoing_type_name}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>اجمالي الخصومات :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Invoice->total_items_discount ?? 'لم يتم'}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>صافي الفاتورة :</span>
            </div>
            <div class="off_name">
                <span>
                {{$Invoice->net_invoice ?? 'لم يتم'}}
                </span>
            </div>
        </span>
    </div>
    <div dir="rtl" class="company">
        <span>
            <div class="name">
                <span>فاتورة مرتدة :</span>
            </div>
            <div class="off_name">
                <span>
                    @if ($Invoice->return_back_invoice == 1)
                        نعم
                    @else
                        لا
                    @endif
                </span>
            </div>
        </span>
    </div>
</div><br>
<table>
    <thead>
        <tr>
            <th>عنصر مخزون</th>
            <th>كود</th>
            <th>اسم الصنف</th>
            <th>السعر</th>
            <th>الكمية</th>
            <th>الاجمالي</th>
            <th>اجمالي الخصومات</th>
            <th>الاجمالي بعد الخصومات</th>
            <th>اعفاء ضريبي</th>
            <th>ضريبة القيمة المضافة</th>
            <th>ضريبة ارباح تجارية و صناعية</th>
            <th>صافي المبلغ</th>
        </tr>
    </thead>
    <tbody>
        @php
            $InvoiceItems = $Invoice->invoice_items;
        @endphp
        @foreach ($InvoiceItems as $Item)
            <tr>
                <td>
                    @if ($Item->store_item == 1)
                        نعم
                    @else
                        لا
                    @endif
                </td>
                <td>{{$Item->id}}</td>
                <td>{{$Item->item_text}}</td>
                <td>{{$Item->item_price}}جم</td>
                <td>{{$Item->item_quantity}}</td>
                <td>{{$Item->total_item_price}}جم</td>
                <td>{{$Item->item_discount}}جم</td>
                <td>{{$Item->total_after_discounts}}جم</td>
                <td>
                    @if ($Item->tax_exemption == 1)
                        نعم
                    @else
                        لا
                    @endif
                </td>
                <td>{{$Item->vat_tax_value}}جم</td>
                <td>{{$Item->comm_industr_tax}}جم</td>
                <td>{{$Item->net_value}}جم</td>
            </tr>
        @endforeach

    </tbody>

</table>
<hr>
@if ($i != count($Invoices) - 1)
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><hr>

@endif
@endforeach
</body>
</html>
