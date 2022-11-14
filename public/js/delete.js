


function check(){

        if(window.confirm('削除してもよろしいですか？')){
            return true;
        }else{
            return false;
        }
    };

function search(){
    let data={ 'miniprice':500,'maxprice':1000,
                'minstock':0,'maxstock':10
            };

            
            // data.min_price = $('#min_price').text()

    $.ajax({
        type:'get', 
        url: '/test7/public/api/test',
        data:data
    }).done(function(data,textStatus,jqXHR){
        
        console.log('成功');
        console.log(data);
        console.log(data.aaa);
    }).fail(function(jqXHR,textStatus,errorThrown){
        alert('ファイルの取得に失敗しました');
        console.log('失敗');
    });
    }

