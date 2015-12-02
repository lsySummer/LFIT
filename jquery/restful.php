<script src="jquery-1.8.3.min.js"></script>
<fieldset>
    <legend>测试Web Api
    </legend>
    <a href="javascript:add()">添加(post)</a>
    <a href="javascript:update(1)">更新(put)</a>
    <a href="javascript:deletes(1)">删除(delete)</a>
    <a href="/api/test">列表(Get)</a>
    <a href="/api/test/1">实体(Get)</a>
</fieldset>
<script>

    function add() {
		
    	window.alert("je;;0");
        $.ajax({
            url    : "api",
            type   : "POST",
            data   :{"1018"},
            success: function (data) { alert(JSON.stringify(data)); }
   
        });

    }

    //更新
    function update(id) {
        $.ajax({
            url    : "/api/Test?id="+id,
            type   : "Put",
            data   :{"UserID":1,"UserName":"moditest","UserEmail":"Parry@cnblogs.com"},
            success: function (data) { alert(JSON.stringify(data)); }
        });

    }
    function deletes(id) {
        $.ajax({
            url    : "/api/Test/1",
            type   : "DELETE",
            success: function (data) { alert(data);}
        });

    }
</script>