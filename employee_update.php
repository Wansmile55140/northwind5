<php? 
session_start ();
รวม ( ' header.php ' );
#เผยแพร่ใน http://www.thaiall.com/perlphpasp/source.pl?9137
# ===
#ส่วนกำหนดค่าเริ่มต้นของระบบ
$ host      =  " localhost " ;
$ db        =  " wanwan " ;  
$ tb        =  "พนักงาน" ;
$ user      =  " root " ; //รหัสผู้ใช้ให้สอบถามจากผู้ดูแลระบบ
$ password  =  " " ;    //รหัสผ่านให้สอบถามจากผู้ดูแลระบบ
$ create_table_sql  =  "สร้างการทดสอบตาราง (id varchar (20), ns varchar (20), varchar เงินเดือน (20)) " ;
if ( isset ( $ _REQUEST { ' action ' })) $ act  =  $ _REQUEST { ' action ' }; อื่น $ act  =  " " ;
# ===
#ส่วนแสดงผลตามปกติทั้งแบบปกติและแบบหลังกดปุ่มหรือแก้ไข
if ( strlen ( $ act ) ==  0  ||  $ act  ==  " del "  ||  $ act  ==  " edit " ) {
  $ conn  =  mysql_connect ( " $ host " , " $ user " , " $ password " );
  $ R  =  mysql_db_query ( $ DB , " * เลือกจากพนักงาน" ) หรือ ตาย ( " phpMyAdmin - "  .  $ create_table_sql  .  " <br/> "  .  mysql_error ());
  echo  " <table> " ;
  while ( $ o  =  mysql_fetch_object ( $ r )) {
    if ( isset ( $ _REQUEST { ' id ' }) &&  $ _REQUEST { ' id ' }   ==  $ o -> EmployeeID ) $ chg  =  " style = 'background-color: # f9f9f9 " ; อื่น $ chg  =  " readonly style = 'background-color: #ffffdd " ;
    echo  " <tr> <form employees = '' method = post>
      <td> <input ชื่อ id = size = 5 คุ้มค่า = ' " $ o -> EmployeeID . " 'style =' สีพื้นหลัง: #dddddd' อ่านได้อย่างเดียว> </ td>   
      <td> <ใส่ชื่อ = NS size = 40 คุ้มค่า = ' " $ o -> FirstName . " ' $ CHG '> </ td>   
      <td> <ใส่ชื่อ = ขนาดเงินเดือน = 20 คุ้มค่า =' " $ o -> นามสกุล. " ' $ CHG ; text-align: ถูกต้อง'> </ td>   
      <td> " ;
    if ( isset ( $ _REQUEST { ' id ' }) &&  $ _REQUEST { ' id ' } ==  $ o -> EmployeeID ) {
      ถ้า ( $ act  ==  " del " ) echo  " <input type = ส่งชื่อ = action value = 'del: ยืนยัน' style = 'height: 40; background-color: yellow'> " ;
      ถ้า ( $ act  ==  " edit " ) echo  " <input type = ส่งชื่อ = action value = 'แก้ไข: ยืนยัน' style = 'height: 40; background-color: #aaffaa'> " ;
    } else {
      echo  " <input type = ส่งชื่อ = action value = 'del' style = 'height: 26'> <input type = ส่งชื่อ = action value = 'edit' style = 'height: 26'> " ;
    }
    echo  " </ td> </ form> </ tr> " ;
  }	
  echo  " <tr> <form action = '' method = post> <td> <input name = ขนาดของ id = 5> </ td> <td> <input name = ns size = 40> </ td> <td> <input name = ขนาดเงินเดือน = 20> </ td> <td> <input type = ส่งชื่อ = action value = 'add' style = 'height: 26'> </ td> </ tr>
  </ form> </ table> " ;
  ถ้า ( isset ( $ _SESSION [ "ผงชูรส" ])) echo  "ฟรี" $ _SESSION [ " msg " ];
  $ _SESSION [ " msg " ] =  " " ;
  รวม ( ' footer.php ' );
  ออก ;
} 
# ===
#ส่วนเพิ่มข้อมูล
if ( $ act  ==  " add " ) {
  $ Q   =  "แทรกลงในพนักงานของ บริษัท (EmployeeID, นามสกุล, FirstName) ค่า ( ' " $ _REQUEST { ' ID ' } . " ', ' " $ _REQUEST { ' NS ' } . " ',' " . $ _REQUEST { 'เงินเดือน' } . " ') " ;      
  $ conn  =  mysql_connect ( " $ host " , " $ user " , " $ password " );
  $ r  =  mysql_db_query ( db $ , $ q );   
  if ( $ r ) $ _SESSION [ " msg " ] =  "แทรก: สมบูรณ์" ;
  mysql_close ( $ connect );  
  ส่วนหัว ( "สถานที่: " .  $ _SERVER [ "สคริปต์" ]);
}
# ===
#ส่วนลบข้อมูล
if ( $ act  ==  " del: confirm " ) {
  $ Q   =  "ลบจากพนักงานที่ EmployeeID =' "  $ _REQUEST { ' ID ' }  " ' " ;
  $ conn  =  mysql_connect ( " $ host " , " $ user " , " $ password " );
  $ r  =  mysql_db_query ( db $ , $ q );   
  if ( $ r ) $ _SESSION [ " msg " ] =  "ลบ: สมบูรณ์" ;
  mysql_close ( $ connect );  
  ส่วนหัว ( "สถานที่: " .  $ _SERVER [ "สคริปต์" ]);
}
# ===
# section แก้ไขข้อมูล
if ( $ act  ==  " edit: confirm " ) {
  $ Q   =  "ปรับปรุง$ tbชุด FirstName =' "  $ _REQUEST { ' NS ' }  " 'นามสกุล =' "  $ _REQUEST { 'เงินเดือน' }  ""โดย EmployeeID = "  .  $ _REQUEST { ' id ' };
  $ conn  =  mysql_connect ( " $ host " , " $ user " , " $ password " );
  $ r  =  mysql_db_query ( db $ , $ q );   
  if ( $ r ) $ _SESSION [ " msg " ] =  "แก้ไข: สมบูรณ์" ;
  mysql_close ( $ connect );  
  ส่วนหัว ( "สถานที่: " .  $ _SERVER [ "สคริปต์" ]);
}
? >