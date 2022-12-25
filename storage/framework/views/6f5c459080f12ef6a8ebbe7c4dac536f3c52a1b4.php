<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>商品情報編集画面</h1>
        <p>商品情報ID</p>
            <form action="<?php echo e(route('product_update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <table>
                    <tr>
                        <th>商品名</th>
                        <td><input type="text" name="name" value="<?php echo e($product->product_name); ?>" required></td>
                    </tr>
                    <tr>
                        <th>メーカー</th>
                        <td><select name="update" required>
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($company->id); ?>"><?php echo e($company->representative_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>価格</th>
                        <td><input type="text" name="price" value="<?php echo e($product->price); ?>" required></td>
                    </tr>
                    <tr>
                        <th>在庫</th>
                        <td><input type="text" name="stock" value="<?php echo e($product->stock); ?>"required></td>
                    </tr>
                    <tr>
                        <th>コメント</th>
                        <td><textarea name="comment" value="<?php echo e($product->comment); ?>"></textarea></td>
                    </tr>
                    <tr>
                        <th>商品画像</th>
                        <td><input type="file" name="img" value="<?php echo e($product->img_path); ?>"></td>
                    </tr>
                </table>

                    <button type="submit">更新する</button>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                
            </form>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/test7/resources/views/update_view.blade.php ENDPATH**/ ?>