<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-menu');

$__html = app('livewire')->mount($__name, $__params, 'lw-2921459309-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow-xl" sm:rounded-lg>
                <div class="mb-8">
                    <h3 class="text-xl text-stone-900 mb-1">Títuo del Artículo</h3>
                    <span class="text-gray-500"><?php echo e($postid->titulo); ?></span>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl text-stone-900 mb-1">Fecha del Artículo</h3>
                    <span class="text-gray-500"><?php echo e($postid->fecha->format('d-m-Y')); ?></span>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl text-stone-900 mb-1">Extracto del Artículo</h3>
                    <span class="text-gray-500"><?php echo e($postid->extracto); ?></span>
                </div>

                <div class="mb-8">
                    <h3 class="text-xl text-stone-900 mb-1">Descripción del Artículo</h3>
                    <span class="text-gray-500"><?php echo e($postid->descripcion); ?></span>
                </div>

                <div class="mb-8">
                    <img src="<?php echo e(Storage::url($postid->imagen)); ?>" alt="" class="block mx-auto">
                </div>

                <a href="<?php echo e(route('controlpanel')); ?>" class="text-lg text-blue-500 hover:underline">Volver al Panel</a>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\curso_laravel\jetstream\app_blog\resources\views/single-post.blade.php ENDPATH**/ ?>