{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('lottery_id', 'Lottery_id:') !!}
			{!! Form::text('lottery_id') !!}
		</li>
		<li>
			{!! Form::label('number_ticket', 'Number_ticket:') !!}
			{!! Form::text('number_ticket') !!}
		</li>
		<li>
			{!! Form::label('paid_ticket', 'Paid_ticket:') !!}
			{!! Form::text('paid_ticket') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}