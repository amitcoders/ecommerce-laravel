
<?php $__env->startSection('content'); ?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('fontend/img/breadcrumb.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Wishlist Page</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo e('/'); ?>">Home</a>
                        <span>Wishlist Page</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            
                <?php if(session('cart_delete')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('cart_delete')); ?>

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
                <?php if(session('cart_update')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('cart_update')); ?>

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
                <?php if(session('coupon_applied')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('coupon_applied')); ?>

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
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Add to Cart</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="<?php echo e(asset('images/products/'.$row->product->image_one)); ?>" alt="" width="100px" height="100px">
                                    <h5><?php echo e($row->product->product_name); ?></h5>
                                </td>
                                <td class="shoping__cart__price">
                                    <?php echo e($row->product->price); ?>

                                </td>
                                <td class="shoping__cart__price">
                                    <form action="<?php echo e(url('add/to-cart/'.$row->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="price" value="<?php echo e($row->product->price); ?>">
                                    </form>
                                    <a class="btn btn-sm btn-danger" href="">Add to cart</a>
                                    <!-- <?php echo e($row->product->price); ?> -->
                                </td>
                                <!-- <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <form action="<?php echo e(route('cart.quantity.update',$row->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="<?php echo e($row->qty); ?>" min="1">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </form>
                                    </div>
                                </td> -->
                                <td class="shoping__cart__total">
                                    <?php echo e($row->price * $row->qty); ?>

                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="<?php echo e(route('wishlist.destroy', $row->id)); ?>"> <span class="icon_close"></a>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- Shoping Cart Section End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front_end_index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-laravel\resources\views\pages\wishlist.blade.php ENDPATH**/ ?>