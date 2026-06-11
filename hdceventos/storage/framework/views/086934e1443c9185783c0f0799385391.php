<?php $__env->startSection('title', $event->title); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-md-10 offset-md-1">
        <div class="row">

        <div id="image-container" class="col-md-6">
            
        <img src="<?php echo e(asset('storage/events/' . $event->image)); ?>" class="img-fluid" alt="<?php echo e($event->title); ?>">
        </div>
        <div id="info-container" class="col-md-6">
        <h1><?php echo e($event->title); ?></h1>
        <p class="event-city"> <ion-icon name="location-outline"></ion-icon> <?php echo e($event->city); ?> </p>
        <p class="event-participants"> <ion-icon name="people-outline"></ion-icon> <?php echo e(count($event->users)); ?> Participantes </p>
        <p class="event-owner"> <ion-icon name="star-outline"></ion-icon> <?php echo e($eventOwner['name']); ?> </p>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$hasUserJoined): ?>
        <?php echo csrf_field(); ?>
        <form action="/events/join/<?php echo e($event->id); ?>" method="POST">
            
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-primary">Confirmar Presença</button><form action="/events/join/<?php echo e($event->id); ?>" method="POST">
        </form>
        <?php else: ?>
         <p class="already-joined-msg">Você já confirmou sua presença neste evento.</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
        
        
        <h3>O evento conta com:</h3>
        <ul id="items-list">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $event->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><ion-icon name="play-outline"></ion-icon><span><?php echo e($item); ?></span></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>
    </div>
        <div id="description-container" class="col-md-12">  
            <h3>Sobre o Evento:</h3>
            <p class="event-description"> <?php echo e($event->description); ?> </p>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LARAVEL\hdceventos\resources\views/events/show.blade.php ENDPATH**/ ?>