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

<div class="col-lg-6">
    <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        {{ Form::date('birthdate', $user->birthdate, ['class' => 'form-control', 'placeholder' => 'Birthdate', 'id' => 'birthdate']) }}
        {{ Form::label('birthdate', 'Birthdate', ['class' => 'lab-style']) }}
        @if ($errors->has('birthdate'))
            <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone', 'id' => 'phone']) }}
        {{ Form::label('phone', 'Phone', ['class' => 'lab-style']) }}
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        {{ Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Address', 'id' => 'address']) }}
        {{ Form::label('address', 'Address', ['class' => 'lab-style']) }}
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }}">
        @if($user->profile_picture)
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" style="max-width: 100px; max-height: 100px;">
        @endif
        <br>
        <label for="profile_picture" class="lab-style">Profile Picture</label>
        <input type="file" name="profile_picture" id="profile_picture" class="form-control">
        @if ($errors->has('profile_picture'))
            <span class="help-block">
                <strong>{{ $errors->first('profile_picture') }}</strong>
            </span>
        @endif
        <br>
        <div id="profile_picture_preview"></div>
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group{{ $errors->has('background') ? ' has-error' : '' }}">
        {{ Form::textarea('background', $user->background, ['class' => 'form-control', 'placeholder' => 'Background', 'id' => 'background']) }}
        {{ Form::label('background', 'Background', ['class' => 'lab-style']) }}
        @if ($errors->has('background'))
            <span class="help-block">
                <strong>{{ $errors->first('background') }}</strong>
            </span>
        @endif
    </div>
</div>
