{{ csrf_field() }}
{{ Form::hidden('id', $user->id) }}
<div class="col-lg-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name', 'id' => 'name']) }}
        {{ Form::label('name', 'Name *', ['class' => 'lab-style']) }}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']) }}
        {{ Form::label('email', 'Email *', ['class' => 'lab-style']) }}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
   