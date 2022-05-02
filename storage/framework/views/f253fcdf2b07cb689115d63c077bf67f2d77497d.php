
<?php $__env->startSection('content'); ?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('fontend/img/breadcrumb.jpg')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
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
                <?php if(session('coupon_remove')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('coupon_remove')); ?>

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
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="<?php echo e(asset('images/products/'.$cart->product->image_one)); ?>" alt="" width="100px" height="100px">
                                    <h5><?php echo e($cart->product->product_name); ?></h5>
                                </td>
                                <td class="shoping__cart__price">
                                    <?php echo e($cart->product->price); ?>

                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <form action="<?php echo e(route('cart.quantity.update',$cart->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="<?php echo e($cart->qty); ?>" min="1">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    <?php echo e($cart->price * $cart->qty); ?>

                                </td>
                                <td class="shoping__cart__item__close">
                                    <a href="<?php echo e(route('cart.destroy', $cart->id)); ?>"> <span class="icon_close"></a>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?php echo e('/'); ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <?php if(session()->get('coupon')['coupon_nmae']): ?>
                <?php else: ?>
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="<?php echo e(route('cart.coupon.apply')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="coupon_name" placeholder="Enter your coupon code">
                            <button type="submit" class="btn btn-primary">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <?php if(Session::has('coupon')): ?>
                        <li>Subtotal <span><?php echo e($subtotal); ?></span></li>
                        <li>coupon <span><?php echo e(session()->get('coupon')['coupon_nmae']); ?>

                            <a href="<?php echo e(route('coupon_remove')); ?>">X</a>
                        </span></li>
                        <li>Discount <span><?php echo e(session()->get('coupon')['coupon_discount']); ?> %( <?php echo e(session()->get('coupon')['discount_amount']); ?> tk)</span></li>
                        
                            <li>Total <span>$ <?php echo e($subtotal - session()->get('coupon')['discount_amount']); ?></span> </li>
                        <?php else: ?>   
                        <li>Total <span><?php echo e($subtotal); ?></span></li>
                        <?php endif; ?>
                    </ul>
                    <a href="<?php echo e(route('checkout.index')); ?>" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front_end_index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-laravel\resources\views/pages/cart.blade.php ENDPATH**/ ?>