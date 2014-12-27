@extends('admin::layouts.main')

{{ Tee\System\Asset::add(moduleAsset('admin', 'js/tableorder.js')) }}

@section('content')
    <table class="table table-hover table-banner-list">
        <tbody>
            <tr>
                <th>{{{ attributeName($modelClass, 'image') }}}</th>
                <th>{{{ attributeName($modelClass, 'url') }}}</th>
                <th>Opções</th>
            </tr>
        
            @if($models->count() > 0)
                @foreach($models as $model)
                    <tr data-id="{{{ $model->id }}}">
                        <td>
                            @if($orderable)
                                <div style="float:left;">
                                    <a href="javascript:void(0)" class="glyphicon glyphicon-chevron-up" ></a>
                                    <a href="javascript:void(0)" class="glyphicon glyphicon-chevron-down" ></a>
                                    &nbsp;
                                </div>
                            @endif
                            <div style="float:left;">
                                <img src="{{{ URL::to('/').$model->image->url('left') }}}" title="{{$model->title}}" height="100" />
                            </div>
                            <div style="float:left;margin-left:10px;">
                                <h3>{{{ $model->title }}}</h3>
                                <p>{{{ $model->description }}}</p>
                            </div>

                        </td>
                        <td>
                            {{{ $model->url }}}
                        </td>
                        <td>
                            {{ HTML::updateButton('Editar', route("admin.$resourceName.edit", $model->id)) }}
                            {{ HTML::deleteButton('Remover', route("admin.$resourceName.destroy", $model->id)) }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        Nenhuma item cadastrado
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{ route("admin.$resourceName.create") }}">
        Adicionar Item
    </a>

    @if($orderable)
        <script type="text/javascript">
            $(document).ready(function() {
                $('.table-banner-list').tableOrder({
                    itens: 'tbody tr',
                    up: '.glyphicon-chevron-up',
                    down: '.glyphicon-chevron-down',
                    url: '{{ route("admin.$resourceName.order") }}'
                });
            });
        </script>
    @endif
@stop