@props(['id' => '', 'title' => '', 'wire' => '', 'header' => '', 'size' => '', 'noFooter' => false, 'prueba' => '', 'sinFondo' => false])


<div class="modal fade" {{ $wire }} id="{{ $id }}" data-backdrop="static" data-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
    style="{{ $sinFondo ? 'background-color: #000e;' : '' }}">
    <div class="modal-dialog modal-dialog-scrollable {{ $size }}">
        <div class="modal-content ">
            <div class="modal-header {{ $header }}">
                <button type="button" class="close" onclick="$('#{{ $id }}').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (isset($bodyModal))
                    {{ $bodyModal }}
                @else
                    <section class="bs-validation">
                        <div class="row">
                            <div class="col-12">
                                <div class="card" style="overflow: hidden;">
                                    <div class="card-header">
                                        <h3 class="card-title" style="font-weight: 900;">{{ $title }}</h3>
                                        {{ $prueba }}
                                    </div>
                                    <div class="card-body">
                                        @if (isset($form))
                                            {{ $form }}
                                        @endif
                                        {{ $slot }}

                                    </div>

                                    @if (!$noFooter)
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="$('#{{ $id }}').modal('hide')">Cancelar</button>
                                            {{ $button_modal }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
</div>
