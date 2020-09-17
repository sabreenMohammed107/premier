<table class="table" id="table" style="direction:rtl">
	<thead>
		<tr>
			<th>الشهر</th>
			<th>الترصيد السنوي</th>
			<th>الفترة من</th>
			<th>الفترة إلي</th>
			<th>النوع</th>
			<th>مغلقة</th>
			<th>الإغلاق</th>
		</tr>
	</thead>
	<tbody>
		@foreach($months as $index=>$row)
		<tr>
			<td>{{$index+1}}</td>
			<td>{{$row->year}}</td>
			<td>
				<?php
				$date = date_create($row->period_open_date) ?>
				{{ date_format($date,"d-m-Y") }}
			</td>
			<td> <?php
					$date = date_create($row->period_closed_date) ?>
				{{ date_format($date,"d-m-Y") }}</td>
			<td>@if($row->can_change==1 || $row->can_change==2&& !$row->month_type==1 )مفتوحه @else مغلقة @endif</td>
			<td>@if($row->can_change==1 || $row->can_change==2&& !$row->month_type==1 )<i class="fa fa-check"></i>@else <i class="fa fa-times"></i> @endif</td>
			<td>
				<div class="product-buttons">
					@if($row->can_change==1)
					<button onclick="closeMonth({{$row->id}})" title="Trash">إغلاق</button>
					@elseif($row->can_change==0)
					<button title="Trash" onclick="openMonth({{$row->id}})" class="pd-setting-ed">ألغاء الأغلاق</button>
					@else
					<button title="Trash" disabled class="btn btn-danger">ألغاء الأغلاق</button>
					@endif
				</div>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>