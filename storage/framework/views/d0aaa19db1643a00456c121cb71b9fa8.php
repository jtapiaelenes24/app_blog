<div>
    <section class="max-w-7xl mx-auto p-6 lg:p-8">
        <h2 class="text-center text-3xl">Panel de Administración</h2>

        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('create-post');

$__html = app('livewire')->mount($__name, $__params, 'lw-2256714409-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <div class="grid grid-cols-1 gap-6 lg:gap-8">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="bg-gray-200 m-10 p-4 rounded-lg shadow-sm">
                    <h2 class="text-2xl text-gray-950">
                        <?php echo e($post->id); ?>._
                        <span class="ml-1 text-2xl text-gray-950 my-2"><?php echo e($post->titulo); ?></span>
                    </h2>

                    <div class="mt-3 space-x-2">
                        <a href="#" title="Ver post"
                            class="text-center text-gray-500 rounded-3xl hover:no-underline hover:text-gray-700 transition duration-150 hover:ease-in">
                            <i class="fa fa-eye"></i>
                        </a>

                        <button title="Editar post"
                            class="text-center text-gray-500 rounded-3xl hover:no-underline hover:text-gray-700 transition duration-150 hover:ease-in">
                            <i class="fa fa-pencil-square-o"></i>
                        </button>

                        <a href="#" title="Borrar post"
                            class="text-center text-gray-500 rounded-3xl hover:no-underline hover:cursor-pointer hover:text-gray-700 transition duration-150 hover:ease-in">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!--[if BLOCK]><![endif]--><?php if($posts->hasPages()): ?>
            <div class="py-3">
                <?php echo e($posts->links()); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </section>
</div>
<?php /**PATH C:\wamp64\www\curso_laravel\jetstream\app_blog\resources\views/livewire/control-panel.blade.php ENDPATH**/ ?>