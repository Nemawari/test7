    

    <?php $__env->startSection('content'); ?>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">ユーザーログイン画面</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">ユーザー新規登録</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    商品情報一覧画面
                </div>

                <div class="links">
                    <?php echo csrf_field(); ?>
                    <table>
                        <thead>
                            <tr>
                                <th>商品名</th>
                                <th>メーカー名</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->product_name); ?></td>
                                <td><?php echo e($product->price); ?></td>
                                <td><?php echo e($product->stock); ?></td>
                                <td><button type="button" onClick="location.href='<?php echo e(route('detail',['id' => $product->id])); ?>'">詳細編集</button></td>
                                <td>
                                <form method="post" action="<?php echo e(route('delete',['id' => $product->id])); ?>" >
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" onclick="return check()">削除</button>
                                </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <select name="company">
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($company->id); ?>"><?php echo e($company->representative_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <form action="<?php echo e(route('search')); ?>" method="get">
                            <input type="text" name="item_name">
                            <!-- submit切ってる -->
                            <button type="button" onclick="search()">検索</button>
                    <?php if(session('products')): ?>
                            <?php $__currentLoopData = session('products'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($product->product_name); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($product->product_name); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php endif; ?>
                    </form>
                    

                    <a href ="<?php echo e(route('create')); ?>">新規登録</a>
                  
                </div>
            </div>
        </div>
            
    <?php $__env->stopSection(); ?>

                       

<?php echo $__env->make('layouts.products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/test7/resources/views/list_view.blade.php ENDPATH**/ ?>