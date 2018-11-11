layui.config({
	base : "js/"
}).use(['form','layer','jquery'],function(){

    var form = layui.form;

    layer = parent.layer === undefined ? layui.layer : parent.layer;
    //监听提交
    form.on('submit(formDemo)', function(data){

        $.post('', data.field, function (data) {
            if (data.code === 200) {
                layer.msg(data.msg);
                layer.close(index);
            } else {
                layer.close(index);
                layer.msg(data.msg);
            }
        }, "json").fail(function (a, b, c) {
            layer.msg('没有权限');
        });
        return false;
    });
});



