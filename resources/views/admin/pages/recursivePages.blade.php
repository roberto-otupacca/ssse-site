
        <ul class="nested">
            @php 
                if(is_null($NodeId))
                    $data = $pages->whereNull('parent_id')->sortBy('display_order');
                else 
                    $data = $pages->where('parent_id', $NodeId)->sortBy('display_order');
            @endphp
            @foreach($data as $node)
                <li><span class="{{($pages->where('parent_id', $node->id)->count() > 0)?'caret':''}}"></span>
                    <a href="{{ route('admin.pages.edit', $node->id) }}" class="tree-element" id="{{$node->id}}">
                    {{$node->title}}
                    </a>
                    <div class="btn-group float" role="group">
                        <a href="{{url('/'.$node->slug)}}" target="blank" class="btn btn-xs btn-secondary"">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        {{-- @can('page_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.pages.show', $node->id) }}">
                                <i class="fas fa-info fa-sm"></i>
                            </a>
                        @endcan --}}

                        {{-- @can('page_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.pages.edit', $node->id) }}">
                                <i class="far fa-edit fa-sm"></i>
                            </a>
                        @endcan --}}

                        {{-- @can('page_delete')
                            <form action="{{ route('admin.pages.destroy', $node->id) }}" 
                                    method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" 
                                    >
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                
                                <button type="submit"  class="btn btn-xs btn-danger" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">
                                    <i class="far fa-trash-alt fa-sm"></i>
                                </button>
                            </form>
                        @endcan --}}
                    </div>
                    @if($pages->where('parent_id', $node->id)->count() > 0)
                        @php
                            $NodeId = $node->id;
                        @endphp
                        @include('admin.pages.recursivePages')
                    @endif
                    
                    
                </li>
            @endforeach
        </ul>