@extends('Layout.company')




@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="{{url('/Company')}}"> الرئيسية</a><span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="{{ url("/Company/Employees")}}">الموظفين</a> <span class="bread-slash"> / </span>
    </li>
    <li>
    <span class="bread-blod">
        @isset($Employee->person_name)
        {{$Employee->person_name}}
        @endisset
    </span>
    </li>
</ul>

@endsection

@section('content')
		<!-- Single pro tab review Start-->
		<div class="single-pro-review-area mt-t-30 mg-b-15">
			<div class="container-fluid">
                <a href="{{ url("/Company/Employees")}}" class="btn btn-primary waves-effect waves-light mg-b-15">رجــــــوع</a>
            @component('/Company/components/EmployeeForm')
            @slot('image')
            @isset($Employee->person_logo)
                {{$Employee->person_logo}}
            @endisset
            @endslot
                @slot('company')
                    {{$CompanyId}}
                @endslot
            @if($type == 'View' || $type == 'Edit')
            @slot('image_path')
                {{ asset("/uploads/person/$Employee->person_logo") }}
            @endslot
            @slot('name')
                {{$Employee->person_name}}
            @endslot
            @slot('notes')
                {{$Employee->notes}}
            @endslot
            @slot('nick_name')
                {{$Employee->person_nick_name}}
            @endslot
            @slot('registeration_no')
                {{$Employee->registeration_no}}
            @endslot
            @slot('phone1')
                {{$Employee->phone1}}
            @endslot
            @slot('phone2')
                {{$Employee->phone2}}
            @endslot
            @slot('address')
                {{$Employee->address}}
            @endslot
            @slot('tax_authority')
                {{$Employee->tax_authority}}
            @endslot
            @slot('active')
                {{$Employee->active}}
            @endslot
            @slot('check')
                @if($Employee->active == 1)
                checked
                @endif
            @endslot
            @slot('email')
                {{$Employee->email}}
            @endslot
            @slot('openBalance')
                {{$Employee->open_balance}}
            @endslot
            @slot('openBalanceDate')
                {{$Employee->balance_start_date}}
            @endslot
            @slot('current')
                {{$TotalBalance}}
            @endslot
                    @if($type == 'View')
                        @slot('title')
                            بيانات الموظف : {{$Employee->person_name}}
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
                            تعديل بيانات الموظف : {{$Employee->person_name}}
                        @endslot
                        @slot('button')
                            تعديل البيانات
                        @endslot
                        @slot('action')
                            {{ url("/Company/Employee/$Employee->id/Update") }}
                        @endslot
                        @slot('person')
                            {{$Employee->id}}
                        @endslot
                    @endif
            {{-- @slot('image')
                {{$Employee->image}}
            @endslot --}}

            @else
                @slot('title')
                    أضافة موظف
                @endslot

                @slot('button')
                            أضافة الموظف
                @endslot
                @slot('action')
                    {{ url("/Company/Employee/Create") }}
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
