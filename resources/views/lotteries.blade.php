{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('eslogan', 'Eslogan:') !!}
			{!! Form::text('eslogan') !!}
		</li>
		<li>
			{!! Form::label('nit', 'Nit:') !!}
			{!! Form::text('nit') !!}
		</li>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('representative', 'Representative:') !!}
			{!! Form::text('representative') !!}
		</li>
		<li>
			{!! Form::label('date_start', 'Date_start:') !!}
			{!! Form::text('date_start') !!}
		</li>
		<li>
			{!! Form::label('date_end', 'Date_end:') !!}
			{!! Form::text('date_end') !!}
		</li>
		<li>
			{!! Form::label('ticket_value', 'Ticket_value:') !!}
			{!! Form::text('ticket_value') !!}
		</li>
		<li>
			{!! Form::label('lottery', 'Lottery:') !!}
			{!! Form::text('lottery') !!}
		</li>
		<li>
			{!! Form::label('winning_number_lottery', 'Winning_number_lottery:') !!}
			{!! Form::text('winning_number_lottery') !!}
		</li>
		<li>
			{!! Form::label('commission_sale', 'Commission_sale:') !!}
			{!! Form::text('commission_sale') !!}
		</li>
		<li>
			{!! Form::label('address', 'Address:') !!}
			{!! Form::text('address') !!}
		</li>
		<li>
			{!! Form::label('city', 'City:') !!}
			{!! Form::text('city') !!}
		</li>
		<li>
			{!! Form::label('per_commission_sale', 'Per_commission_sale:') !!}
			{!! Form::text('per_commission_sale') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}