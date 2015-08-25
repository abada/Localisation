<div class="box-body">
     
        <div class="box-body">
        <div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[title]", trans('localisation::countries.form.title')) !!}
            {!! Form::text("{$lang}[title]", old("{$lang}.title"), ['class' => "form-control", 'placeholder' => trans('localisation::countries.form.title')]) !!}
            {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
        </div>
       
        
    </div>
     
</div>
