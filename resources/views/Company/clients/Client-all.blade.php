@extends('Layout.company')




@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/Company')}}">الرئيسية</a> <span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="{{ url("/Company/Clients")}}">العملاء</a> <span class="bread-slash"> / </span>
    </li>
    <li>
    <span class="bread-blod">
        @if(isset($Client->person_name))
        {{$Client->person_name}}
        @else
        أضافة جديد
        @endif
    </span>
    </li>
</ul>

@endsection

@section('content')
		<!-- Single pro tab review Start-->
		<div class="single-pro-review-area mt-t-30 mg-b-15">
			<div class="container-fluid">
                <a href="{{ url("/Company/Clients")}}" class="btn btn-primary waves-effect waves-light mg-b-15">رجــــــوع</a>
            @component('/Company/components/ClientForm')
            @slot('image')
            @isset($Client->person_logo)
                {{$Client->person_logo}}
            @endisset
            @endslot
                @slot('company')
                    {{$CompanyId}}
                @endslot
            @if($type == 'View' || $type == 'Edit')
            @slot('current')
                {{$ClientTrans->current}}
            @endslot
            @slot('name')
                {{$Client->person_name}}
            @endslot
            @slot('nick_name')
                {{$Client->person_nick_name}}
            @endslot
            @slot('tax_card')
                {{$Client->tax_card}}
            @endslot
            @slot('contact_person_name')
                {{$Client->contact_person_name}}
            @endslot
            @slot('contact_person_mobile')
                {{$Client->contact_person_mobile}}
            @endslot
            @slot('website')
                {{$Client->website}}
            @endslot
            @slot('legal_entity')
                {{$Client->legal_entity}}
            @endslot
            @slot('notes')
                {{$Client->notes}}
            @endslot
            @slot('commercial_register')
                {{$Client->commercial_register}}
            @endslot
            @slot('registeration_no')
                {{$Client->registeration_no}}
            @endslot
            @slot('phone1')
                {{$Client->phone1}}
            @endslot
            @slot('phone2')
                {{$Client->phone2}}
            @endslot
            @slot('address')
                {{$Client->address}}
            @endslot
            @slot('tax_authority')
                {{$Client->tax_authority}}
            @endslot
            @slot('active')
                {{$Client->active}}
            @endslot
            @slot('check')
                @if($Client->active == 1)
                checked
                @endif
            @endslot
            @slot('checkt')
                @if($Client->taxable == 1)
                checked
                @endif
            @endslot
            @slot('email')
                {{$Client->email}}
            @endslot
            @slot('openBalance')
                {{$Client->open_balance}}
            @endslot
            @slot('openBalanceDate')
                {{$Client->balance_start_date}}
            @endslot
                    @if($type == 'View')
                        @slot('title')
                            بيانات العميل : {{$Client->person_name}}
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
                            تعديل بيانات العميل : {{$Client->person_name}}
                        @endslot
                        @slot('button')
                            تعديل البيانات
                        @endslot
                        @slot('action')
                            {{ url("/Company/Client/$Client->id/Update") }}
                        @endslot
                        @slot('person')
                            {{$Client->id}}
                        @endslot
                    @endif
            {{-- @slot('image')
                {{$Client->image}}
            @endslot --}}

            @else
                @slot('title')
                    أضافة عميل
                @endslot

                @slot('button')
                            أضافة العميل
                @endslot
                @slot('action')
                    {{ url("/Company/Client/Create") }}
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
                    $('input[name ="person_name"]').val("");
                    $('input[name ="person_nick_name"]').val("");
                    $('input[name ="registeration_no"]').val("");
                    $('input[name ="phone1"]').val("");
                    $('input[name ="address"]').val("");
                    $('input[name ="phone2"]').val("");
                    $('input[name ="fax"]').val("");
                    $('input[name ="email"]').val("");
                    $('input[name ="role_name"]').val("");
                    $('input[name ="legal_entity"]').val("");
                    $('input[name ="open_balance"]').val("");
                    $('input[name ="balance_start_date"]').val("");
                    $('input[name ="tax_authority"]').val("");
                }
            </script>
        @endsection
