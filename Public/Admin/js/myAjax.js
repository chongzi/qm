/**
 * 上传图片
 */
 /*
$(function(){
	var litpic_tip = $(".litpic_tip");
	var btn = $(".up-picture-btn span");
	$("#upload_picture").wrap("<form id='myupload' action='"+base_url+"Entry/upload' method='post' enctype='multipart/form-data'></form>");
    $("#upload_picture").change(function(){
    	if($("#fileupload").val() == "") return;
		$("#myupload").ajaxSubmit({
			dataType:  'json',
			beforeSend: function() {
        		$('#litpic_show').empty();
				btn.html("上传中...");
    		},
			success: function(data) {
				if(data.status == 1){
					var fileSize = parseFloat(data.info.size/1024).toFixed(2);
					litpic_tip.html(""+ data.info.name +" 上传成功("+ fileSize +"k)");
					var timg = data.msg; //原图
					$('#litpic_show').html("<img src='"+upload_url+timg+"' width='120' alt=''>");
					$("#litpic").val(timg);
				}else {
					litpic_tip.html(data.msg);		
				}			
					btn.html("+ 浏览上传");

			},
			error:function(xhr){
				btn.html("上传失败"+xhr);
				litpic_tip.html(xhr);
			}
		});
	});
	
	
})
*/

//搜索功能
$("#search").click(function(){
	var url = $(this).attr('url');
	var query = $(this).parents().prev().children('input').serialize();
	query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
	query = query.replace(/^&/g,'');
	if( url.indexOf('?')>0 ){
		url += '&' + query;
	}else{
		url += '?' + query;
	}
	window.location.href = url;
});	

//全选
$("#check-all").on('ifChanged',function(){
	var checkboxes = $("tr td").find(':checkbox');
	if($(this).is(':checked')) {
		checkboxes.iCheck('check');
	} else {
		checkboxes.iCheck('uncheck');
	}
});

//批量处理
function batch(obj){
	var url = $(".shop-form").attr("action");
	layer.confirm('确定要进行此操作吗？', {
	  btn: ['确定','取消'] //按钮
	}, function(){
		if($(":checkbox[name='id[]']:checked").size() == 0) {
			layer.msg('请选择数据');
			return false;
		}
		$("input[name='BatchType']").val(obj);
		$.ajax({
			url: url,
			type: "POST",
			data: $(".shop-form").serialize(),
			dataType: "json",
			success: function(msg){
				if(msg.status == 1){
					layer.msg(msg.info, {icon:1}, function(){ window.location.reload();}); //设置成功
				}else{
					layer.msg(msg.info, {icon:2});
				}   
			}					
		})

	});		
}
