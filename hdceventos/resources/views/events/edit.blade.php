@extends('layouts.main')
@section('title', 'Editando: ' . $event->title)
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->title }}</h1>
    
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="form-control">
            <img src="/storage/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
        </div>
        
        <div class="mb-3">
            <label for="title">Evento:</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Nome do evento" value="{{ $event->title }}">
        </div>
        
        {{-- FIX DA DATA: Convertendo a string para o formato aceito pelo HTML (Y-m-d) --}}
        <div class="mb-3">
            <label for="date">Data do Evento:</label>
            <input type="date" id="date" name="date" class="form-control" value="{{ $event->date ? date('Y-m-d', strtotime($event->date)) : '' }}">
        </div>
        
        {{-- CORRIGIDO: Mudado de <div> para <input> para salvar a cidade corretamente --}}
        <div class="mb-3">
            <label for="city">Cidade:</label>
            <input type="text" id="city" name="city" class="form-control" placeholder="Cidade do evento" value="{{ $event->city }}">
        </div>
        
        <div class="mb-3">
            <label for="private">O evento é privado?</label>
            <select id="private" name="private" class="form-control">
                <option value="0" {{ $event->private == 0 ? "selected" : "" }}>Não</option>
                <option value="1" {{ $event->private == 1 ? "selected" : "" }}>Sim</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" class="form-control" placeholder="Descrição do evento">{{ $event->description }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="items">Itens de Infraestrutura:</label>
            
            {{-- Mantém os checkboxes marcados com base no que já foi salvo --}}
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Cadeiras" {{ is_array($event->items) && in_array('Cadeiras', $event->items) ? 'checked' : '' }}> Cadeiras
            </div>
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Palco" {{ is_array($event->items) && in_array('Palco', $event->items) ? 'checked' : '' }}> Palco
            </div>
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Bebida" {{ is_array($event->items) && in_array('Bebida', $event->items) ? 'checked' : '' }}> Bebida
            </div>
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Open food" {{ is_array($event->items) && in_array('Open food', $event->items) ? 'checked' : '' }}> Open food
            </div>
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Brindes" {{ is_array($event->items) && in_array('Brindes', $event->items) ? 'checked' : '' }}> Brindes
            </div>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>
@endsection