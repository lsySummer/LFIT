<?php

if ($db = sqlite_open("lfit.db",0666,$sqliteerror)) {
  
/*创建表 
 * identity 0:管理员 1：普通用户 2：医生 3：教练
 * 性别：0男 1女
 */
sqlite_query($db, "create table userBasic(uid integer primary key,
		uname varchar(20) not null,upass varchar(20) not null,uidentity int(11) not null,
		ugoal int(11) not null,udocid int(11) not null,ucoaid int(11) not null,udate date not null,
		uimg text,usex int(11),ubirth text,uplace varchar(10),
		uword text);");
sqlite_query($db,"create table dataHealth(did integer primary key,
		uid int(11) not null,udate date not null,weight int(11) not null
		,hr int(11) not null,bp int(11) not null);");
sqlite_query($db,"create table dfeedback(dfid integer primary key,
		uid int(11) not null,did int(11) not null,udate date not null,
		info text
		);");
sqlite_query($db,"create table cfeedback(cfid integer primary key,
		uid int(11) not null,coid int(11) not null,udate date not null,
		info text
		);");
sqlite_query($db,"create table uactivity(uaid integer primary key,
		uid int(11) not null,acid int(11) not null);");
sqlite_query($db,"create table uinterest(uiid integer primary key,
		uid int(11) not null,inid int(11) not null);");
sqlite_query($db,"create table activity(aid integer primary key,
		atime date not null,place text not null,info text not null
		);");
sqlite_query($db,"create table interest(iid integer primary key,
		itime date not null,place text not null,info text not null
		,inum int(11) not null
		);");
sqlite_query($db,"create table complain(cid integer primary key,
		uid int(11) not null,toid int(11) not null,info text not null,
		img text
		);");
sqlite_query($db,"create table unews(unid integer primary key,
		udate date not null,info text not null
		);");

  
  
//显示结果
// while ($item = sqlite_fetch_array($res, SQLITE_ASSOC)) {
// print "ID:".$item["id"] ."NAME:".$item["name"];
// print "<BR>";
// };
  
//关闭数据库
// SELECT语句
//INSERT语句

$sql = "insert into userBasic values(0, '0','0',0,5,2,3,'2015-11-30','..',0,'2015-11-12','Nanjing','Come on!')";
$res = sqlite_query($db, $sql);


// $sql = "insert into userBasic values(null, '1','1',1,5,2,3,'2015-11-30')";
// $res = sqlite_query($db, $sql);

// $sql = "insert into userBasic values(null, '2','2',2,5,2,3,'2015-11-30')";
// $res = sqlite_query($db, $sql);

// $sql = "insert into userBasic values(null, '3','3',3,5,2,3,'2015-11-30')";
// $res = sqlite_query($db, $sql);

// $sql = "insert into dfeedback values(null, 2,2,'2015-12-01','One apple a day keep me away!')";
// $res = sqlite_query($db, $sql);

// $sql = "insert into cfeedback values(null, 1,3,'2015-11-30','请好好锻炼，增强心肺功能。')";
// $res = sqlite_query($db, $sql);
// $sql = "select * from userBasic order by uid desc limit 20";
  
//执行SQL语句
// $res = sqlite_unbuffered_query($db, $sql);
// while ($item = sqlite_fetch_array($res, SQLITE_ASSOC)) {
// 	print "ID:".$item["uid"] ."NAME:".$item["uname"] ."PASS:".$item["upass"];
	
// 	print "<BR>";
// };
print "over";
sqlite_close($db);
  
}else{ 
echo 'connect bad'; 
}

?>