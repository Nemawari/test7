    

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
                    <form id="search" action="<?php echo e(route('search')); ?>" method="get">
                            <input id="item_name" type="text" name="item_name"><br>
                            <!-- ソートの器 hidden -->
                            <input type='hidden' id="sort_ordered" value='desc'>
                            <input type='hidden' id="sort_col" value='id'>
                            <!-- 仕様書2. 価格上限下限、在庫上限下限 -->
                            <p>価格</p>
                            <input type='number' id="price_up" value='1000'>
                            <input type='number' id="price_down" value='0'><br>
                            <p>在庫</p>
                            <input type='number' id="stock_up" value='10'>
                            <input type='number' id="stock_down" value='0'>
                            <!-- submit切る? -->
                            <button id="ajax_search" type="button">検索</button>
                            <!-- ↓　ステップ８　ソート機能 -->
                            <button id="ajax_sort" type="button">ソート</button>
                    <!-- ステップ８ ajax 検索項目 -->
                    <table border="1">
                        <caption>検索結果</caption>
                        <thead id="endsearch">
                            <tr>
                                <!-- ステップ８　aタグ 非同期処理 -->
                                <th><a href="#" id="ajax_1">商品名</a></th>
                                <th><a href="#" id="ajax_2">価格</a></th>
                                <th><a href="#" id="ajax_3">在庫数</a></th>
                                <th>削除</th>
                                
                            </tr>
                        </thead>
                        <tbody id="ajax_table">
                           
                        </tbody>
                    </table>

                    </form>
                    
                    <a href ="<?php echo e(route('create')); ?>" >新規登録</a>
                  
                </div>
            </div>
        </div>
            
    <?php $__env->stopSection(); ?>

                       



    <!-- <?php if(session('products')): ?>
                            <?php $__currentLoopData = session('products'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($product->product_name); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($product->product_name); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php endif; ?> -->
<?php echo $__env->make('layouts.products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/test8/resources/views/list_view.blade.php ENDPATH**/ ?>