<?php
$user_id=numer($_GET['id']);
dbSelect("users","*","WHERE id = ? LIMIT 1",[$user_id]);
//التحقق من وجود الموظف
// if($countrows == 0){
//     sweet("error","خطأ ","الموظف غير موجود ","employees");
//     die();
// }
$users=$rows[0];
?>
<div class="pagetitle">
      <h1>تعديل الموظف</h1>
      
</div><!-- End Page Title -->

<?php 
if(isset($_POST['update'])){
    $csrf->verify();//التحقق من كود csrf
    $name=safer($_POST['name']);
    $employee_id=numer($_POST['employee_id']);
    $email=safer($_POST['email']);
    //$password=safer($_POST['password']);
    $gender=safer($_POST['gender']);
    $age=safer($_POST['age']);
    $date_join=safer($_POST['date_join']);
    $phone=numer($_POST['phone']);
  
    dbSelect("users","id","WHERE employee_id = ?",[$employee_id]);
    if($countrows >= 1){
      sweet("error","خطأ","الرقم الوظيفي موجود بالفعل");
    }else{
    if(!empty($employee_id)and !empty($email)){

   
      if(!empty($_FILES['image']['name'])){
        $ImageName= genCode("users","image","token",16);
        up($ImageName,"image","../../panel/files/profiles",10);
      }else{
        $filename=$users['image'];
      }
      $cols="name= ?, employee_id= ?, email= ?,gender= ?,	age= ?,	date_join= ?,	image= ?,	phone= ?";
      $values=[$name,$employee_id,$email,$gender,$age,$date_join,$filename,$phone,$user_id];
      dbUpdate("users",$cols,$values,"WHERE id = ? LIMIT 1");
    //  dbInsert("users",$cols,$values);
     sweet("success","نجاح","تم تعديل الموظف بنجاح","here");

    }else{
        sweet("error","خطأ","الرقم الوظيفي والايميل وكلمة المرور هي حقول اجبارية");
    }
    } 

}
?>
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">تعديل الموظف : <?php echo $users['name'] ?> </h5>

              <!-- اسم العرض للموظف -->
              <!--encrype بنستخدمه عشان في عنا رفع ملفات-->
              <form method="post" action="" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">اسم الموظف</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="name"  placeholder="الاسم الكامل للموظف "value="<?php echo $users['name'] ?>" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">جنس الموظف </label>
                  <div class="col-sm-12">

                    <input type="radio"  name="gender" value="male" <?php if ($users['gender'] == "male"){ echo "checked";} ?>>
                    <label>ذكر</label>
                    <input type="radio"  name="gender" value="female" <?php if ($users['gender'] == "female"){ echo "checked";} ?>>
                    <label>انثى</label>
                  </div>
                </div>
                <!-- اعدادات بيانات الدخول للموظف -->
                
                <div class="row mb-5">
                    <div class="col-md-4">
                    <label  class=" col-form-label">الرقم الوظيفي </label>
                     <div class="col-sm-10">
                     <input type="number" class="form-control" name="employee_id"  placeholder="الرقم الوظيفي للموظف  " value="<?php echo $users['employee_id'] ?>"  >
                     </div>
                    </div>

                    <div class="col-md-4">
                     <label  class=" col-form-label">ايميل الموظف</label>
                     <div class="col-sm-10">
                      <input type="email" class="form-control" name="email"  placeholder=" ايميل الموظف للدخول للمنصة" value="<?php echo $users['email'] ?>" required >
                     </div>
                    </div>

                    <div class="col-md-4">
                     <label  class=" col-form-label"> كلمة المرور الموظف</label>
                     <div class="col-sm-10">
                     <input type="text" class="form-control" name="password"  placeholder=" كلمة السر للدخول للمنصة" >
                     </div>
                    </div>
                </div>


                
                 <!--   معلومات عامة عن الموظف -->  
                
                 <div class="row mb-5">
                    <div class="col-md-6">
                     <label  class=" col-form-label"> تاريخ الميلاد</label>
                     <div class="col-sm-10">
                      <input type="date" class="form-control" name="age" value="<?php echo $users['age'] ?>" required>
                     </div>
                    </div>

                    <div class="col-md-6">
                     <label  class=" col-form-label"> تاريخ تعيين الموظف</label>
                     <div class="col-sm-10">
                     <input type="date" class="form-control" name="date_join" value="<?php echo $users['date_join'] ?>" required>
                     </div>
                    </div>
                     

               
                </div>
                <div class="row mb-3">
                       <label  class="col-sm-2 col-form-label">صورة الموظف</label>
                       <div class="col-sm-6">
                       <input type="file" class="form-control" name="image">
                       </div>
                       <div class="col-sm-4">
                         <img src="../panel/files/profiles/<?php echo $users['image']?>" alt="">
                       </div>
                </div>
                <div class="row mb-3">
                      <label  class="col-sm-2 col-form-label">رقم الهاتف </label>
                      <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone" placeholder="رقم هاتف الموظف" value="<?php echo $users['phone'] ?>">
                      </div>
                </div>

                
                <?php
                $csrf->input();
                ?>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="تعديل الموظف" name="update">
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>