<?php $__env->startSection('title', 'Produtos'); ?>
<?php $__env->startSection('content'); ?>


    <h1>Tela de produtos</h1>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($busca != ''): ?>
        <p>O usuário está buscando por: <?php echo e($busca); ?></p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\LARAVEL\hdceventos\resources\views/produtos.blade.php ENDPATH**/ ?>