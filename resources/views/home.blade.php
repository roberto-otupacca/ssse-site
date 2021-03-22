@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ trans('global.configPanel') }}</h4>
                </div>

                <div class="card-body">
                    @if(!is_null(session('success')))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif 
                    {{-- Radio button Darkmode --}}
                    <form class="form-inline" method="POST" action="{{ route("admin.save-setting", ['setting' => 'darkmode']) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-2">
                            <strong><label for="darkmode">{{ trans('global.configColor') }}</strong>
                        </div>
                            @foreach(['white' => 'Visualizzazione normale', 'dark' => 'Dark Mode'] as $key => $color)
                                <fieldset class="form-group mx-sm-2 my-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="darkmode" 
                                                id="color-{{$key}}" value="{{$key}}" 
                                                {{ (session('settings')->where('name', 'darkmode')->where('val', $key)->count())? 'checked="checked"' : '' }}>
                                                
                                        <label class="form-check-label" for="color-{{$key}}">
                                            {{$color}}
                                        </label>
                                    </div>
                                </fieldset>
                            @endforeach
                          
                        <button class="btn btn-xs btn-danger" type="submit">
                            {{ trans('global.saveConfig') }}
                        </button>
                    </form>
                    
                    {{-- Radio button menu a destra si/no --}}
                    <form class="form-inline" method="POST" action="{{ route("admin.save-setting", ['setting' => 'sitecolumns']) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-2">
                            <strong><label for="sitecolumns">{{ trans('global.configSiteColumns') }}</strong>
                        </div>
                            @foreach(['one' => 'Visione a una colonna', 'two' => 'Visione a due colonne'] as $key => $color)
                                <fieldset class="form-group mx-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sitecolumns" 
                                                id="color-{{$key}}" value="{{$key}}" 
                                                {{ (session('settings')->where('name', 'sitecolumns')->where('val', $key)->count())? 'checked="checked"' : '' }}>
                                                
                                        <label class="form-check-label" for="color-{{$key}}">
                                            {{$color}}
                                        </label>
                                    </div>
                                </fieldset>
                            @endforeach
                          
                        <button class="btn btn-xs btn-danger" type="submit">
                            {{ trans('global.saveConfig') }}
                        </button>
                    </form>

                    
                    {{-- Radio button menu a destra si/no --}}
                    <form class="form-inline" method="POST" action="{{ route("admin.save-setting", ['setting' => 'menurows']) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-2">
                            <strong><label for="menurows">{{ trans('global.configMenuRows') }}</strong>
                        </div>
                            @foreach(['1' => 'Visione a una riga', '2' => 'Visione a due righe'] as $key => $data)
                                <fieldset class="form-group mx-sm-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="menurows" 
                                                id="data-menurows-{{$key}}" value="{{$key}}" 
                                                {{ (session('settings')->where('name', 'menurows')->where('val', $key)->count())? 'checked="checked"' : '' }}>
                                                
                                        <label class="form-check-label" for="data-menurows-{{$key}}">
                                            {{$data}}
                                        </label>
                                    </div>
                                </fieldset>
                            @endforeach
                          
                        <button class="btn btn-xs btn-danger" type="submit">
                            {{ trans('global.saveConfig') }}
                        </button>
                    </form>


                    {{-- Numero news da vedere in prima pagina --}}
                    <form class="form-inline" method="POST" action="{{ route("admin.save-setting", ['setting' => 'newsnumber']) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-2">
                            <strong>
                                <label for="newsnumber">{{ trans('global.configNewsNumber') }}</label>
                            </strong>
                        </div>        
                        <div class="form-group mx-sm-2">
                            <input class="form-control" 
                                   type="number" name="newsnumber" id="newsnumber" 
                                   value="{{intval(session('settings')->where('name', 'newsnumber')->first()->val)}}" >
                        </div>

                        <button class="btn btn-xs btn-danger" type="submit">
                            {{ trans('global.saveConfig') }}
                        </button>
                    </form>

                    
                    {{-- Radio button statistiche visibili si/no --}}
                    <form class="form-inline" method="POST" action="{{ route("admin.save-setting", ['setting' => 'statistics']) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-2">
                            <strong><label for="statistics">{{ trans('global.configStatistics') }}</strong>
                        </div>
                            @foreach(['yes' => 'Sì', 'no' => 'No'] as $key => $color)
                                <fieldset class="form-group mx-sm-2 my-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="statistics" 
                                                id="color-{{$key}}" value="{{$key}}" 
                                                {{ (session('settings')->where('name', 'statistics')->where('val', $key)->count())? 'checked="checked"' : '' }}>
                                                
                                        <label class="form-check-label" for="color-{{$key}}">
                                            {{$color}}
                                        </label>
                                    </div>
                                </fieldset>
                            @endforeach
                          
                        <button class="btn btn-xs btn-danger" type="submit">
                            {{ trans('global.saveConfig') }}
                        </button>
                    </form>

                    
                    {{-- Radio button statistiche visibili si/no --}}
                    <form class="form-inline" method="POST" action="{{ route("admin.save-setting", ['setting' => 'statposition']) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group my-2">
                            <strong><label for="statposition">{{ trans('global.configStatposition') }}</strong>
                        </div>
                            @foreach(['up' => 'Sopra', 'down' => 'Sotto'] as $key => $color)
                                <fieldset class="form-group mx-sm-2 my-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="statposition" 
                                                id="color-{{$key}}" value="{{$key}}" 
                                                {{ (session('settings')->where('name', 'statposition')->where('val', $key)->count())? 'checked="checked"' : '' }}>
                                                
                                        <label class="form-check-label" for="color-{{$key}}">
                                            {{$color}}
                                        </label>
                                    </div>
                                </fieldset>
                            @endforeach
                          
                        <button class="btn btn-xs btn-danger" type="submit">
                            {{ trans('global.saveConfig') }}
                        </button>
                    </form>


                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ultime attività</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="list-group">
                                <h5 class="list-group-item list-group-item-action active btn-secondary">
                                  Ultime pagine modificate o inserite
                                </h5>
                                @foreach($pages as $page)
                                    <a href="{{url('/admin/pages/') .'/'. $page->id . '/edit'}}">
                                        <button type="button" class="list-group-item list-group-item-action">
                                            <div class="row">
                                                <div class="col-lg-8">{{$page->title}}</div>
                                                <div class="col-lg-4 text-right">
                                                    {{utf8_encode(\Carbon\Carbon::instance($page->updated_at)->formatLocalized('%A %d %B %Y'))}}
                                                </div>
                                            </div>
                                             </button>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="list-group">
                                <h5 class="list-group-item list-group-item-action active btn-secondary">
                                  Ultime news modificate o inserite
                                </h5>
                                @foreach($news as $n)
                                    <a href="{{url('/admin/news/') .'/'. $n->id . '/edit'}}">
                                        <button type="button" class="list-group-item list-group-item-action">
                                            <div class="row">
                                                <div class="col-lg-8">{{$n->title}}</div>
                                                <div class="col-lg-4 text-right">
                                                    {{utf8_encode(\Carbon\Carbon::instance($n->updated_at)->formatLocalized('%A %d %B %Y'))}}
                                                </div>
                                            </div>
                                        </button>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection