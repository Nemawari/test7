



$(function search(){
    $('#ajax_search').on('click',sort_product)

// ステップ８　ソート機能の処理（一度しか処理ないため無名関数でも良い）
    $('#ajax_sort').on('click',sort_product)
    // aタグ　非同期処理
    $('#ajax_1').on('click',function(e){
        e.preventDefault();
        // 押下したときの処理
        if($('#sort_col').val()!=="id"){
            $('#sort_col').val("id");
            $('#sort_ordered').val("asc");
        }
        if ($('#sort_ordered').val()=="desc"){
            $('#sort_ordered').val("asc");
        }else{
            $('#sort_ordered').val("desc");
        }
        sort_product()
    });
    // 価格 処理
    $('#ajax_2').on('click',function(e){
        e.preventDefault();
        // 押下したときの処理
        if($('#sort_col').val()!=="price"){
            $('#sort_col').val("price");
            $('#sort_ordered').val("asc");
        }
        if ($('#sort_ordered').val()=="desc"){
            $('#sort_ordered').val("asc");
        }else{
            $('#sort_ordered').val("desc");
        }
        sort_product()
    })
    // 在庫数 処理
    $('#ajax_3').on('click',function(e){
        e.preventDefault();
        // 押下したときの処理
        if($('#sort_col').val()!=="stock"){
            $('#sort_col').val("stock");
            $('#sort_ordered').val("asc");
        }
        if ($('#sort_ordered').val()=="desc"){
            $('#sort_ordered').val("asc");
        }else{
            $('#sort_ordered').val("desc");
        }
        sort_product()

    })
});



function sort_product(){
    $.ajax({
        type:'post',
        url: 'http://localhost:8888/test8/public/api/ajax_search',
        dataType: 'json',
        // 58行目　クライアント　サーバー側と共通 左側パラメータ
        data:{"search":$('#item_name').val(),
        "sort_ordered":$('#sort_ordered').val(),
        "sort_col":$('#sort_col').val(),
        // 仕様書2. 価格上限〜下限、在庫上限〜下限　処理
        "price_up_ajax":$('#price_up').val(),
        "price_down_ajax":$('#price_down').val(),
        "stock_up_ajax":$('#stock_up').val(),
        "stock_down_ajax":$('#stock_down').val()
    }
    
})
.done(function(data,textStatus,jqXHR){
    
    {
        const tbody=$('#ajax_table');
        tbody.empty();
        
        for(const i of data.products){
            const tr=$('<tr></tr>');
            tbody.append(tr);
            
            let td=$('<td></td>');
            td.text(i.product_name);
                tr.append(td);
                
                td=$('<td></td>');
                td.text(i.price);
                tr.append(td);
                
                td=$('<td></td>');
                td.text(i.stock);
                tr.append(td);
                
                // 仕様書4. 削除処理 削除する対象のレコードはどうやって特定するかの記述
                td=$('<td></td>');
                const deletelink=$('<a></a>');
                deletelink.text('削除');
                deletelink.attr('href','#');
                // 間違いなく削除しなきゃいけないものを特定ー＞id
                deletelink.attr('id','del'+i.id);
                td.append(deletelink);
                tr.append(td);

                // 仕様書5 購入ボタン
                // td=$('<td></td>');
                // const buylink=$('<a></a>');
                // buylink.text('購入');
                // buylink.attr('href','#');
                // td.append(buylink);
                // tr.append(td);
                
            }
            console.log('成功');

            // 仕様書4. 削除処理　非同期化処理 ^=で前方一致
            $('a[id^="del"]').on('click',function(e){
                let tr=$(this).parent().parent();
                let ajax_del=$(this).attr('id');

                ajax_del= ajax_del.replace('del','');


                $.ajax({
                    type:'post',
                    url: 'http://localhost:8888/test8/public/api/product_delete/'+ajax_del,
                    dataType: 'json',
                    data:{}
                })
                
                .done(function(data1,textStatus1,jqXHR1){
                    $(tr).remove();
                })
                .fail(function(data2,textStatus2,jqXHR2){
                    alert('ファイルの削除に失敗しました');
                    console.log('削除失敗');
                })

                e.preventDefault();
                console.log('削除');
            })
            
        };
        
    })
    
    .fail(function(jqXHR,textStatus,errorThrown){
        // 処理を中に書く、外に書くと常にうまく行かない
        alert('ファイルの取得に失敗しました');
        console.log('失敗');
    })
}



// let data={ 'miniprice':500,'maxprice':1000,
//             'minstock':0,'maxstock':10
//         };
// data.min_price = $('#min_price').text()


// function search_product(){
//     // ↓　. 付けるの忘れない 、each必要か？
//     $.ajax({
//         type:'post', 
//         url: 'http://localhost:8888/test8/public/api/ajax_search',
//         dataType: 'json',
//         data:{"search":$('#item_name').val()}
//     })
//     .done(function(data,textStatus,jqXHR){

//         {
//             const tbody=$('#ajax_table');
//             tbody.empty();

//             for(const i of data.products){
//                 const tr=$('<tr></tr>');
//                 tbody.append(tr);
                
//                 const td=$('<td></td>');
//                 td.text(i.product_name);
//                 tr.append(td);
//             }
//             console.log('成功');
//         };
    
//     })
    
//     .fail(function(jqXHR,textStatus,errorThrown){
//         // 処理を中に書く、外に書くと常にうまく行かない
//         alert('ファイルの取得に失敗しました');
//         console.log('失敗');
//     })
// };