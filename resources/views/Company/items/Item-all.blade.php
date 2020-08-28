@extends('Layout.company')




@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الرئيسية<span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="{{ url("/Company/Items")}}">العملاء</a> <span class="bread-slash"> / </span>
    </li>
    <li>
    <span class="bread-blod">
        @isset($Item->person_name)
        {{$Item->person_name}}
        @endisset
    </span>
    </li>
</ul>

@endsection

@section('content')
		<!-- Single pro tab review Start-->
		<div class="single-pro-review-area mt-t-30 mg-b-15">
			<div class="container-fluid">
                <a href="{{ url("/Company/Items")}}" class="btn btn-primary waves-effect waves-light mg-b-15">رجــــــوع</a>
            @component('/Company/components/ItemForm')
            @slot('image')
            @isset($Item->item_image)
                {{$Item->item_image}}
            @endisset
            @endslot
                @slot('company')
                    {{$CompanyId}}
                @endslot
            @if($type == 'View' || $type == 'Edit')
            @slot('total_open_balance_cost')
                {{$TotalBalance}}
            @endslot
            @slot('item_code')
                {{$Item->item_code}}
            @endslot
            @slot('item_arabic_name')
                {{$Item->item_arabic_name}}
            @endslot
            @slot('item_english_name')
                {{$Item->item_english_name}}
            @endslot
            @slot('balance_start_date')
                {{$Item->balance_start_date}}
            @endslot
            @slot('total_open_balance_qty')
                {{$Item->total_open_balance_qty}}
            @endslot
            @slot('open_item_price')
                {{$Item->open_item_price}}
            @endslot
                    @if($type == 'View')
                        @slot('title')
                            بيانات المنتج : {{$Item->item_arabic_name}}
                        @endslot
                        @slot('disabled')
                            disabled
                        @endslot
                        @slot('style')
                            display:none;
                        @endslot
                    @else
                        @slot('open')
                            @if ($Open == 1)
                                disabled
                            @endif
                        @endslot
                        @slot('title')
                            تعديل بيانات المنتج : {{$Item->item_arabic_name}}
                        @endslot
                        @slot('button')
                            تعديل البيانات
                        @endslot
                        @slot('action')
                            {{ url("/Company/Item/$Item->id/Update") }}
                        @endslot
                        @slot('item')
                            {{$Item->id}}
                        @endslot
                    @endif
            {{-- @slot('image')
                {{$Item->image}}
            @endslot --}}

            @else
                @slot('title')
                    أضافة منتج
                @endslot

                @slot('button')
                            أضافة المنتج
                @endslot
                @slot('action')
                    {{ url("/Company/Item/Create") }}
                @endslot
            @endif
            <strong>حدث خطأ ما!</strong> حاول مره أخرى!
            @endcomponent
			</div>
		</div>
@endsection

@section('modal')
<!--Modal-->

        <!--/Modal-->

        @endsection
        @section('scripts')
            <script>
                function customReset(){
                    $('input[name ="total_open_balance_cost"]').val("");
                    $('input[name ="item_code"]').val("");
                    $('input[name ="item_arabic_name"]').val("");
                    $('input[name ="item_english_name"]').val("");
                    $('input[name ="balance_start_date"]').val("");
                    $('input[name ="total_open_balance_qty"]').val("");
                    $('input[name ="open_item_price"]').val("");
                }
            </script>
        @endsection
