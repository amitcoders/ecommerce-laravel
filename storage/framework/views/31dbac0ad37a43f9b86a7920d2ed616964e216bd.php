

<?php $__env->startSection('admin_content'); ?>
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
        <span class="breadcrumb-item active">Products</span>
    </nav>

    <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-lg-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Manage Product</h6>
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
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Product Quantity</th>  
                                <th>Status</th>
                                <th>Action</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(asset('images/products/'.$amit->image_one)); ?>" alt="image" width="50" height="50">
                                    </td>
                                    <td><?php echo e($amit->product_name); ?></td>
                                   <td><?php echo e($amit->category->category_name); ?></td>
                                    <td><?php echo e($amit->product_quantity); ?></td>
                                    <td><?php echo e($amit->status); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('edit.products', $amit->id)); ?>" class="btn btn-success">Edit</a>
                                        <a href="<?php echo e(route('delete.products', $amit->id)); ?>" class="btn btn-danger">Delete</a>
                                        <?php if($amit->status == 1): ?>
                                        <a class="btn btn-info" href="<?php echo e(route('products.inactive', $amit->id)); ?>">Active</a>
                                    <?php else: ?>
                                        <a class="btn btn-primary" href="<?php echo e(route('products.active', $amit->id)); ?>">Inactive</a>
                                    <?php endif; ?>
                                </td>
                                </tr>
                                <td>
                                </td>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
            </div><!-- form-layout -->
            </div>
        </div><!-- card -->
    </div>


</div><!-- sl-mainpanel -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-laravel\resources\views\admin\product\manage_product.blade.php ENDPATH**/ ?>