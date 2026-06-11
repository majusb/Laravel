<?php $__env->startSection('title', 'HDC Eventos'); ?>

<?php $__env->startSection('content'); ?>


<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET"> 
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>

<div id="events-container" class="col-md-12">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
        <h2>Buscando por: <?php echo e($search); ?></h2>
    <?php else: ?>
    <h2>Próximos eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div id="cards-container" class="row">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card col-md-3">
                <img src="<?php echo e(asset('storage/events/' . $event->image)); ?>" class="card-img-top" alt="<?php echo e($event->title); ?>">
                <div class="card-body">
                    <p class="card-date"><?php echo e(date('d/m/Y', strtotime($event->date))); ?></p>
                    <h5 class="card-title"><?php echo e($event->title); ?></h5>
                    <p class="card-participants"> <?php echo e(count($event->users)); ?> Participantes</p>
                    <a href="/events/<?php echo e($event->id); ?>" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($events) == 0 && $search): ?> 
                <p>Não foi possível encontrar nenhum evento com <?php echo e($search); ?>! <a href="/">Ver todos os eventos</a></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php elseif(count($events) == 0): ?>
            <p>Não há eventos disponíveis</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LARAVEL\hdceventos\resources\views/welcome.blade.php ENDPATH**/ ?>