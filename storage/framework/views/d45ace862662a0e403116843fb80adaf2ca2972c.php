

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card mt-3">
        <h1>Reserve a Book</h1>
 <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <form class="col-lg-8" method="POST" action="<?php echo e(route('reservations.store')); ?>">
 <?php echo csrf_field(); ?>

 <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>" />
 
 <lable for="bookID"> <?php echo e($book->title); ?></lable> <br>

 <input type="hidden" name="book_id" value="<?php echo e($book->id); ?>" />
 <button type="submit" class="btn btn-primary">reserve</button>
 
 </form>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(\Session::has('success')): ?>
    <div class="alert alert-success">
        <ul>
            <li><?php echo \Session::get('success'); ?></li>
        </ul>
    </div>
<?php endif; ?>
        </div>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\nodeexperiment\library-management-system\resources\views/reserve.blade.php ENDPATH**/ ?>