 
 <?php $__env->startSection('content'); ?>
 <div class="row">
     <div class="col-2">
         <?php $__env->startComponent('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names]); ?>
         <?php echo $__env->renderComponent(); ?>
     </div>    
     <div class="col-9">
         <div class="container">
             <?php if($category !== null): ?>
                 <a href="<?php echo e(route('products.index'), false); ?>">トップ</a> > <a href="#"><?php echo e($category->major_category_name, false); ?></a> > <?php echo e($category->name, false); ?>

                 <h1><?php echo e($category->name, false); ?>の商品一覧<?php echo e($total_count, false); ?>件</h1>
             <?php endif; ?>
         </div>
         <div>
             Sort By
             <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id', 'ID'));?>
             <?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('price', 'Price'));?>
         </div>         
         <div class="container mt-4">
             <div class="row w-100">
                 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="col-3">
                     <a href="<?php echo e(route('products.show', $product), false); ?>">
                     <?php if($product->image !== ""): ?>
                         <img src="<?php echo e(asset($product->image), false); ?>" class="img-thumbnail">
                         <?php else: ?>
                         <img src="<?php echo e(asset('img/dummy.png'), false); ?>" class="img-thumbnail">
                         <?php endif; ?>
                     </a>
                     <div class="row">
                         <div class="col-12">
                             <p class="samuraimart-product-label mt-2">
                                 <?php echo e($product->name, false); ?><br>
                                 <label>￥<?php echo e($product->price, false); ?></label>
                             </p>
                         </div>
                     </div>
                 </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
         </div>
         <?php echo e($products->appends(request()->query())->links(), false); ?>

     </div>
 </div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/laravel-samuraimart/resources/views/products/index.blade.php ENDPATH**/ ?>