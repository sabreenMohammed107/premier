<table class="table dir-rtl" id="table" >
	<thead>
		<tr>
			<th>{{ __('titles.month') }}</th>
			<th>{{ __('titles.annual_balance') }}</th>
			<th>{{ __('titles.date_from') }}</th>
			<th>{{ __('titles.date_to') }}</th>
			<th>{{ __('titles.type') }}</th>
			<th>{{ __('titles.closing') }}</th>
			<th>{{ __('titles.theclosing') }}</th>
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
					<button onclick="closeMonth({{$row->id}})" title="Trash">{{ __('titles.theclosing') }}</button>
					@elseif($row->can_change==0)
					<button title="Trash" onclick="openMonth({{$row->id}})" class="pd-setting-ed">{{ __('titles.exit_theclosing') }}</button>
					@else
					<button title="Trash" disabled class="btn btn-danger">{{ __('titles.exit_theclosing') }}</button>
					@endif
				</div>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>