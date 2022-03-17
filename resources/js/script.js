$(document).ready(function(){
// membatasi jumlah inputan
var maxGroup = 10;

//melakukan proses multiple input 
$(".addPendidikan").click(function(){
if($('body').find('.fieldGroup').length < maxGroup){
    var fieldHTML = '<div class="fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
    $('body').find('.fieldGroup:last').after(fieldHTML);
}else{
    alert('Maximum '+maxGroup+' groups are allowed.');
}
});

//remove fields group
$("body").on("click",".remove",function(){ 
    $(this).parents(".fieldGroup").remove();
    });
});
