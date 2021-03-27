

<?php $__env->startSection('content'); ?>
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card mt-3">
        <h1>Reservations</h1>
        <table >
 <tr style="border-bottom: 1px solid black;" class="row ">
 <th class="col-md-1"> User</th>
 <th class="col-md-1"> Book</th>
 <!-- <th class="col-md-2"> start date </th>
 <th class="col-md-2"> end date </th>
 <th class="col-md-2"> status </th>
 <th class="col-md-2"> comment </th> -->
 <th class="col-md-2"> submit </th>

 </tr>
 <?php $__currentLoopData = $reservedBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


 <form method="POST" action="/reservations/<?php echo e($reservation->id); ?>">
 <?php echo csrf_field(); ?>
 <?php echo method_field('PUT'); ?>

 <tr style="border-bottom: 1px solid black;" class="row">
 <?php if($reservation->status=="requested"): ?>

 <td class="col-md-1" ><?php echo e($reservation->user_id); ?></td>

 <td class="col-md-1" ><?php echo e($reservation->book_id); ?></td>
 <!-- <td class="col-md-2" ><?php echo e($reservation->startDate); ?></td>
 <td class="col-md-2"><?php echo e($reservation->endDate); ?></td>
 <td class="col-md-2"><select name="status" value="<?php echo e($reservation->status); ?>">

 <option value="accept">Accept</option>
 <option value="decline">Decline</option> -->
    <!-- </select>
    </td>
    <td class="col-md-2"> <input  name="comment"  />
    </td> -->


 <td class="col-md-2">

 <input type="hidden" name="book_id" value="<?php echo e($reservation->book_id); ?>" />
 <!-- <input type="hidden" name="startdate" value="<?php echo e($reservation->startDate); ?>" />
<input type="hidden" name="enddate" value="<?php echo e($reservation->endDate); ?>" /> -->


 <input type="hidden" name="user_id" value="<?php echo e($reservation->user_id); ?>" />

 <button type="submit" class="btn btn-primary">checkout</button>

 </td><?php endif; ?>
 </tr>
 </form>

 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </table>
 </div></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HP\Desktop\nodeexperiment\library-management-system\resources\views/reservedbooks.blade.php ENDPATH**/ ?>