<?php 
$user_id =numer($_GET['id']);
$action = safer($_GET['action']);
if(!empty($user_id)and !empty($action)and $action =="remove"){
    dbSelect("users","id","WHERE id = ? LIMIT 1" ,[$user_id]);
 if($countrows ==1){
    dbDelete("users","WHERE id = ? LIMIT 1",[$user_id]);
   sweet("success","نجاح","تم حذف الموظف بنجاح","employees");
   die();
 }else{
    sweet("error","خطأ","الموظف غير موجود","employees");
    die();
 }
}

?>
<section class="section">
 <div class="row">
    <div class="col-md-12">
        <h5>جميع الموظفين</h5>
        <p class="alert alert-success">في هذه الصفحة ستجد قائمة لجميع الموظفين المضافين لديك</p>
        <div class="card">
            <div class="table-responsive">
    <table class="table datatable">
        <thead class="text-right">
         <tr >
            <th scope="col">#</th>
            <th scope="col">صورة الموظف</th>
            <th scope="col">اسم الموظف</th>
            <th scope="col">الرقم الوظيفي</th>
            <th scope="col">جنس الموظف</th>
            <th scope="col">رقم الهاتف</th>
            <th scope="col">اجراءات</th>
         </tr>
        </thead>
        <tbody>

        <?php
        dbSelect("users","id,name,image,employee_id,gender,phone");
        if($countrows>=1){
            foreach($rows as$row){
                switch($row['gender']){
                    case"male":
                    $gender='<span class="text-info">ذكر</span>';
                    break;
                    case"female":
                    $gender='<span class="text-danger">انثى</span>';
                    break;
                    default:
                    $gender='<span class="text-warning">مجهول</span>';
                }
               echo'
               <tr>
                  <td>'.$row['id'].'</td>
                  <td><img src="../panel/files/profiles/' .$row['image'].'"width="50" ></td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['employee_id'].'</td>
                  <td>'.$gender.'</td>
                  <td>'.$row['phone'].'</td>
                  <td>
                  <a href="employees/'.$row['id'].'/remove" class="btn btn-danger btn-sm" title="حذف الموظف"><i class="bi bi-trash"></i> </span>
                  <a href="employees/'.$row['id'].'/edit" class="btn btn-warning btn-sm" title="تحرير الموظف"><i class="bi bi-pencil-fill"></i></a>
                  </td>

               </tr>
               ';
    
            }
        }
        ?>
           
        </tbody>
    </table>
</div>
        </div>

    </div>
 </div>
</section>
