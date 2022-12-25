<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>
<body>
    <h1>商品新規登録</h1>
    <form method="post" action="<?php echo e(route('product_register')); ?>" >
                <?php echo csrf_field(); ?>
        <table>
            <tr>
                <th><label>商品名</label></th>
                <td><input type="text" name="product_name" required></td>
            </tr>
            <tr>
                <th><label>メーカー</label></th>
                <td><select name="company_id" required>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value = "<?php echo e($company->id); ?>"><?php echo e($company->representative_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label>価格</label></th>
                <td><input type="text" name="price" required></td>
            </tr>
            <tr>
                <th><label>在庫数</label></th>
                <td><input type="text" name="stock" required></td>
            </tr>
            <tr>
                <th><label>コメント</label></th>
                <td><textarea name="comment" id="" ></textarea></td>
           </tr>
           <tr>
                <th><label>商品画像</label></th>
                <td><input type="file" id="" name="img_pth" accept=""></td>
            </tr>
        </table>
         
                 <button type="submit">登録</button>
            
                <button type="button" onClick="history.back()">戻る</button>
    </form>
    
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/test7/resources/views/create_view.blade.php ENDPATH**/ ?>