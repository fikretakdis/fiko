

<script>

$('#summernote').summernote({
        placeholder: 'Mesajınızı buraya yazınız...',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['font', ['bold', 'italic','superscript', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });



var all_abstracts = JSON.parse(JSON.stringify(<?php echo json_encode($admin_all_abstracts,JSON_UNESCAPED_UNICODE)?>));



$(document).ready(function(){

    $(".abstract_search").change(function(){

        var search_text = $(".abstract_search").val();
        var abstract_index =1;
        var all_searched_abstracts ='<tr>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Sıra </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Bildiri <br>No </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Son Bildiri <br>No </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Bildiri <br> Başlık: </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Bildiri <br> Kategori: </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Bildiri <br> Türü: </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Atama Durum: </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Sorumlu <br> Yazar Adı </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Soyadı </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;"><font color="red"><b>B. K. Üye Değ. </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Onayla </b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>İşlemler</b></font></td>';
            all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Sorumlu Yazar ID</b></font></td>';
			all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; text-align:center;" ><font color="red"><b>Sunum</b></font></td>';
            all_searched_abstracts += '</tr>';
        for(i=0;i<all_abstracts.length;i++)
        {
            if(String(all_abstracts[i][0]).toLowerCase().match(search_text.toLowerCase()) ||
            String(all_abstracts[i][1]).toLowerCase().match(search_text.toLowerCase()) ||
            String(all_abstracts[i][2]).toLowerCase().match(search_text.toLowerCase()) ||
            String(all_abstracts[i][3]).toLowerCase().match(search_text.toLowerCase()) ||
            String(all_abstracts[i][4]).toLowerCase().match(search_text.toLowerCase()) ||
            String(all_abstracts[i][6]).toLowerCase().match(search_text.toLowerCase()) ||
            String(all_abstracts[i][7]).toLowerCase().match(search_text.toLowerCase()) ||
            String(all_abstracts[i][12]).toLowerCase().match(search_text.toLowerCase()))
            {
    
                abstract_category_char = all_abstracts[i][17][0].toUpperCase();
                if(all_abstracts[i][12].search("-") != -1)
                {
                    abstract_type_char = all_abstracts[i][12][all_abstracts[i][12].search("-")+1].toUpperCase();
                }
                else
                {
                    abstract_type_char = all_abstracts[i][12][0].toUpperCase();
                }
                last_abstract_no = all_abstracts[i][13];

                all_searched_abstracts += '<tr>';
                all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; "> '+abstract_index+' </td>';
                all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; "> '+abstract_category_char+abstract_type_char+last_abstract_no+' </td>';
                all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; ">'+all_abstracts[i][4]+'</td>';
                all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; " title="'+all_abstracts[i][6]+'">';
                if(all_abstracts[i][6].length > 35)
                {
                    all_searched_abstracts += all_abstracts[i][6].substring(0,35)+'...';
                }
                else
                {
                    all_searched_abstracts += all_abstracts[i][6];
                }
                all_searched_abstracts += '</td>';

                all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; " title="'+all_abstracts[i][7]+'">';
                if(all_abstracts[i][7].length > 10)
                {
                    all_searched_abstracts += all_abstracts[i][7].substring(0,10)+'...';
                }
                else
                {
                    all_searched_abstracts += all_abstracts[i][7];
                }
                all_searched_abstracts += '</td>';
                
                all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; ">'+all_abstracts[i][12]+'</td>';
                if(Array.isArray(JSON.parse(all_abstracts[i][10])))
                {
                    
                    all_searched_abstracts += '<td style="font-size:20px; text-align:center;color:green;"><i style="width:40px;" class="fas fa-check-square"></i></td>';
                }
                else
                {
                    all_searched_abstracts += '<td style="font-size:20px; text-align:center;color:red;"><i  class="fas fa-times-circle"></i></td>';
                }

                if((all_abstracts[i][0] == "null" && all_abstracts[i][1] == "null") || (all_abstracts[i][0] == null && all_abstracts[i][1] == null))
                {
                    all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; " ></td>';
                    all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; " ></td>';
               
                }
                else
                {
                    all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; " >'+all_abstracts[i][0]+'</td>';
                    all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px; " >'+all_abstracts[i][1]+'</td>';
               
                }

                all_searched_abstracts += '<td>'+all_abstracts[i][all_abstracts[i].length-1]+'</td>';

                all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px;">';

                if(all_abstracts[i][5] == 4)
                {
                    all_searched_abstracts += '<i style="background-color:yellow" class="warning fas fa-exclamation-triangle"></i>';
                }
                all_searched_abstracts += '<select id="acception_state_'+i+'" name="acception_state_'+i+'" onChange="admin_abstract_accept(\'acception_state_'+i+'\')">';

                     
                all_searched_abstracts += '<option value="abstract_id='+all_abstracts[i][4]+'&acception=0"';if(parseInt(all_abstracts[i][5]) == 0){all_searched_abstracts += "selected";} all_searched_abstracts +='>Değerlendirilmemiş</option>';
                all_searched_abstracts += '<option value="abstract_id='+all_abstracts[i][4]+'&acception=1"';if(parseInt(all_abstracts[i][5]) == 1){all_searched_abstracts += "selected";} all_searched_abstracts +='>Onayla</option>'; 
                all_searched_abstracts += '<option value="abstract_id='+all_abstracts[i][4]+'&acception=2"';if(parseInt(all_abstracts[i][5]) == 2){all_searched_abstracts += "selected";} all_searched_abstracts +='>Reddet</option>'; 
                all_searched_abstracts += '<option value="abstract_id='+all_abstracts[i][4]+'&acception=3"';if(parseInt(all_abstracts[i][5]) == 3){all_searched_abstracts += "selected";} all_searched_abstracts +='>Düzenleme İste</option>'; 


                all_searched_abstracts += '</select></td>';

                all_searched_abstracts += '<td style="padding-left:7px; padding-right:7px;" >';
                all_searched_abstracts += '<a target="_blank" href="/admin_index?sayfa=abstract_authorization&abstract_id='+all_abstracts[i][4]+'"><i class="fas fa-user-plus" title="Bilim Kurulu Üyesi Ata"></i><a>&nbsp;&nbsp';
                all_searched_abstracts += '<button class="btn" onclick="admin_abstract_delete(\''+all_abstracts[i][4]+'\')"><i class="fas fa-trash-alt" title="Bildiri Sil"></i></button>&nbsp';
                all_searched_abstracts += '<a target="_blank" href="/abstract_viewer?abstract_id='+all_abstracts[i][4]+'"><i class="fas fa-file-alt" title="Görüntüle"></i></a> &nbsp';
                all_searched_abstracts += '<a target="_blank" href="/admin_index?sayfa=abstract_update&abstract_id='+all_abstracts[i][4]+'"><i class="fas fa-pencil-ruler" title="Bildiriyi Düzenle"></i></a> &nbsp';
                all_searched_abstracts += '<a target="_blank" href="/admin_index?sayfa=abstract_category_update&abstract_id='+all_abstracts[i][4]+'"><i class="fas fa-list" title="Bildiri Kategorisini Düzenle"></i></a> </td>';
                all_searched_abstracts += '<td><input type="number" data-id="'+all_abstracts[i][4]+'" class="abstract_main_author_id" value="'+all_abstracts[i][16]+'"></td>';
				all_searched_abstracts += '<td>';
                if(admin_all_abstracts[i][18].length > 0)
                {
                    all_searched_abstracts += '<a target="_blank" href="/view/abstracts/presentations/sunumlar/'+abstract_category_char+abstract_type_char+last_abstract_no+'/'+admin_all_abstracts[i][18]+'">Sunum</a></td>';
                }
                all_searched_abstracts += '</td>';

                all_searched_abstracts += '</tr>';
                abstract_index += 1;
            }
        }
        $(".all_abstracts").html(all_searched_abstracts);
        

    });

});


$(document).ready(function(){

    $(".warning").click(function(){

        alert('Yazar bildiri düzenlemesini gerçekleştirmiştir.');

    });

});


myFunction = function(x) {
    var y ;
     if (confirm("Bildirinizi silmek istediğinizden emin misiniz ?") == true) {
        setTimeout(function(){window.location.href='abstract_delete?id='+x;},10);
     } else {
         y = "Bildiri silme işleminiz iptal edildi!";
         alert(y); 
     }
    
}


function all_presentations()
{
    window.location.href= "/admin_presentation_archiver?get_presentations=all_presentations";
}

function admin_abstract_main_author_mail_compare()
{
    window.location.href= "/admin_abstract_main_author_mail_compare";
}



$(document).ready(function(){
    $(".presentations_by_session").change(function(){
        window.location.href= "/admin_presentation_archiver?get_presentations="+this.value;
    });
});





value=0;

function postForm(path, params, method) {
    method = method || 'post';

    var form = document.createElement('form');
    form.setAttribute('method', method);
    form.setAttribute('action', path);

    for (var key in params) {
        if (params.hasOwnProperty(key)) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', key);
            hiddenField.setAttribute('value', params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}



$( "select[name=search]" )
  .change(function () {

    if(value<=2){

        value+=1;

    }

    if(value>1){

    let str ="";
        $( "select[name=search] option:selected" ).each(function() {
        str += $( this ).val();
        });
        
        postForm('/admin_search?sayfa=all_abstracts', {value:str,abstract:1});


    }
    
    
  })
  .change();

</script>

