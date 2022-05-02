

<?php $__env->startSection('admin_content'); ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="amit">Dashboard</a>
      <span class="breadcrumb-item active">Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo e(session('success')); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td><?php echo e($amit->id); ?></td>
                                <td><?php echo e($amit->brand_name); ?></td>
                               <td><?php if($amit->status == 1): ?>
                                <span class="badge badge-success">active</span>
                                <?php else: ?>
                                <span class="badge badge-danger">Inactive</span>
                                    <?php endif; ?>

                            </td>
                            <td>
                                    <a href="<?php echo e(route('brand.edit', $amit->id)); ?>" class="btn btn-success">Edit</a>
                                    <a href="<?php echo e(route('brand.delete',$amit->id)); ?>" class="btn btn-danger">Delete</a>

                                    <?php if($amit->status == 1): ?>
                                        <a class="btn btn-info" href="<?php echo e(route('brand.inactive',$amit->id)); ?>">Active</a>
                                    <?php else: ?>
                                        <a class="btn btn-primary" href="<?php echo e(route('brand.active',$amit->id)); ?>">Inactive</a>
                                    <?php endif; ?>
                                </td>

                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>


                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Category</div>
                <div class="card-body">
                    <form action="<?php echo e(route('brand.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="category_name">Brand Name</label>

                            <input type="text" class="form-control" id="brand_name" name="brand_name" value="" placeholder="Enter Brand">

                        </div>
                        <div class="form-group">
                            <label for="category_name">Status</label>
                            <input type="number" class="form-control" id="status" placeholder="Enter Status"  name="status">

                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
      </div>


  </div><!-- sl-mainpanel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-laravel\resources\views\admin\brand\index.blade.php ENDPATH**/ ?>