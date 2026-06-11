<?php $__env->startSection('title', 'Criar Evento'); ?>
<?php $__env->startSection('content'); ?>

<div id=event-create-container class="col-md-6 offset-md-3">
    <h1>Crie o seu Evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="title">Evento:</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Nome do evento" required>
        </div>
         <div class="mb-3">
            <label for="date">Data do Evento:</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="city">Cidade:</label>
            <textarea id="city" name="city" class="form-control" placeholder="Cidade do evento" required></textarea>
        </div>
    <div class="mb-3">
            <label for="private">O evento é privado?</label>
            <select id="private" name="private" class="form-control" required>
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" class="form-control" placeholder="Descrição do evento" required></textarea>
        </div>
        <div class="mb-3">
            <label for="title">Itens de Infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras</input>
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco">Palco</input>
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Bebida">Bebida</input>
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open food">Open food</input>
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes">Brindes</input>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LARAVEL\hdceventos\resources\views/events/create.blade.php ENDPATH**/ ?>