@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('localisation::zones.title.edit zone') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.localisation.zone.index') }}">{{ trans('localisation::zones.title.zones') }}</a></li>
        <li class="active">{{ trans('localisation::zones.title.edit zone') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    {!! Theme::style('css/vendor/iCheck/flat/blue.css') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.localisation.zone.update', $zone->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-10">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('localisation::admin.zones.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.localisation.zone.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
        
         <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label("country", 'Country:') !!}
                    <select name="country_id" id="country" class="form-control">
                        <?php foreach ($countries as $country): ?>
                           <option value="{{ $country->id }}" {{  $country->id == $zone->country_id ? 'selected' : '' }}>{{ $country->title }}</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                   {!! Form::label("status", 'status:') !!}
                         
                            <input id="status"
                                   name="status"
                                   type="checkbox"
                                   class="flat-blue"
                                  {{ isset($zone->status) && (bool)$zone->status == true ? 'checked' : '' }}
                                   value="1" />
                            
                            
                        
                    </div>
                 
                </div>
                 
            </div>
        </div>
        
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.localisation.zone.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            $('input[type="checkbox"]').on('ifChecked', function(){
                $(this).parent().find('input[type=hidden]').remove();
            });

            $('input[type="checkbox"]').on('ifUnchecked', function(){
                var name = $(this).attr('name'),
                    input = '<input type="hidden" name="' + name + '" value="0" />';
                $(this).parent().append(input);
            });
        });
    </script>
@stop
