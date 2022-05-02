

<?php $__env->startSection('admin_content'); ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="amit">Dashboard</a>
      <span class="breadcrumb-item active">Category</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Category</div>
                <div class="card-body">
                    <form action="<?php echo e(route('category.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo e($amit['id']); ?>">
                          <label for="exampleInputEmail1" class="form-label">Category</label>
                          <input type="text" value="<?php echo e($amit['category_name']); ?>" class="form-control" id="category_name" name="category_name" value="" placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                          <input type="text" value="<?php echo e($amit['status']); ?>" class="form-control" id="status" name="status" value="" placeholder="Enter Status">

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
      </div>


  </div><!-- sl-mainpanel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-laravel\resources\views\admin\category\edit.blade.php ENDPATH**/ ?>