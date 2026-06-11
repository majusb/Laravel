<?php $__env->startSection('title', 'Editando: ' . $event->title); ?>
<?php $__env->startSection('content'); ?>

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: <?php echo e($event->title); ?></h1>
    
    <form action="/events/update/<?php echo e($event->id); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="mb-3">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="form-control">
            <img src="/storage/events/<?php echo e($event->image); ?>" alt="<?php echo e($event->title); ?>" class="img-preview">
        </div>
        
        <div class="mb-3">
            <label for="title">Evento:</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Nome do evento" value="<?php echo e($event->title); ?>">
        </div>
        
        
        <div class="mb-3">
            <label for="date">Data do Evento:</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo e($event->date ? date('Y-m-d', strtotime($event->date)) : ''); ?>">
        </div>
        
        
        <div class="mb-3">
            <label for="city">Cidade:</label>
            <input type="text" id="city" name="city" class="form-control" placeholder="Cidade do evento" value="<?php echo e($event->city); ?>">
        </div>
        
        <div class="mb-3">
            <label for="private">O evento é privado?</label>
            <select id="private" name="private" class="form-control">
                <option value="0" <?php echo e($event->private == 0 ? "selected" : ""); ?>>Não</option>
                <option value="1" <?php echo e($event->private == 1 ? "selected" : ""); ?>>Sim</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" class="form-control" placeholder="Descrição do evento"><?php echo e($event->description); ?></textarea>
        </div>
        
        <div class="mb-3">
            <label for="items">Itens de Infraestrutura:</label>
            
            
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Cadeiras" <?php echo e(is_array($event->items) && in_array('Cadeiras', $event->items) ? 'checked' : ''); ?>> Cadeiras
            </div>
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Palco" <?php echo e(is_array($event->items) && in_array('Palco', $event->items) ? 'checked' : ''); ?>> Palco
            </div>
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Bebida" <?php echo e(is_array($event->items) && in_array('Bebida', $event->items) ? 'checked' : ''); ?>> Bebida
            </div>
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Open food" <?php echo e(is_array($event->items) && in_array('Open food', $event->items) ? 'checked' : ''); ?>> Open food
            </div>
            <div class="form-check">
                <input type="checkbox" name="items[]" class="form-check-input" value="Brindes" <?php echo e(is_array($event->items) && in_array('Brindes', $event->items) ? 'checked' : ''); ?>> Brindes
            </div>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LARAVEL\hdceventos\resources\views/events/edit.blade.php ENDPATH**/ ?>