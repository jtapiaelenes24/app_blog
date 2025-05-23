<div class="mt-16">
    

    <div class="overflow-hidden">
        
        <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['wire:model.live.debounce.500ms' => 'search','class' => 'md:float-right py-1 px-2 w-80 text-stone-700','placeholder' => 'Buscar post...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live.debounce.500ms' => 'search','class' => 'md:float-right py-1 px-2 w-80 text-stone-700','placeholder' => 'Buscar post...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(count($posts)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="bg-gray-200 m-10 p-4">
                    <div>
                        
                        <img src="<?php echo e(Storage::url($post->imagen)); ?>" alt="Imagen del post">
                    </div>

                    <div>
                        <h2 class="text-center text-2xl text-gray-500 my-2">
                            <?php echo e($post->titulo); ?>

                        </h2>
                        
                        <p class="text-left ,y-2 text-gray-500"><?php echo e($post->fecha->format('d-m-Y')); ?></p>
                        <p class="text-left ,y-2 text-gray-500">
                            <?php echo e($post->extracto); ?>

                        </p>
                        <button
                            class="mx-auto text-center text-gray-700 rounded-3xl p-1 block bg-gray-400 w-32 hover:bg-gray-500 hover:underline hover:text-gray-900 transition duration-150 hover:ease-in ">
                            Saber más
                        </button>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

        </div>
    <?php else: ?>
        <div class="text-center text-xl text-red-500">No existe ningún registro</div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


    
    <!--[if BLOCK]><![endif]--><?php if($posts->hasPages()): ?>
        <div class="p-2 bg-stone-200">
            <?php echo e($posts->links()); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

</div>
<?php /**PATH C:\wamp64\www\curso_laravel\jetstream\app_blog\resources\views/livewire/show-post.blade.php ENDPATH**/ ?>