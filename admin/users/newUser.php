<div class="pagetitle">
      <h1>اضافة  موظف جديد </h1>
      
</div><!-- End Page Title -->

<?php 
if(isset($_POST['add'])){
    $csrf->verify();
    $name=safer($_POST['name']);
    $employee_id=numer($_POST['employee_id']);
    $email=safer($_POST['email']);
    $password=safer($_POST['password']);
    $gender=safer($_POST['gender']);
    $age=safer($_POST['age']);
    $date_join=safer($_POST['date_join']);
    $phone=numer($_POST['phone']);
  
    if(!empty($employee_id)and !empty($email)and !empty($password)){

     $password = hash("sha512",$password);

     $password = password_hash($password,PASSWORD_BCRYPT);
   
      if(!empty($_FILES['image']['name'])){ 
       $ImageName= genCode("users","image","token",16);
        up($ImageName,"image","../../panel/files/profiles",10);
      }else{
        $filename="default.png";
      }
      $cols="name, employee_id, email,	password,gender,	age,	date_join,	image,	phone,	register_date";
      $values=[$name,$employee_id,$email,$password,$gender,$age,$date_join,$filename,$phone,date("Y-m-d H:i:s")];
     dbInsert("users",$cols,$values);
     sweet("success","نجاح","تم اضافة الموظف بنجاح","employees");

    }else{
        sweet("error","خطأ","الرقم الوظيفي والايميل وكلمة المرور هي حقول اجبارية");
    }
}
?>
   <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">اضافة موظف جديد للمنصة</h5>

              <!-- اسم العرض للموظف -->
              <!--encrype بنستخدمه عشان في عنا رفع ملفات-->
              <form method="post" action="" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">اسم الموظف</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="name"  placeholder="الاسم الكامل للموظف " required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">جنس الموظف </label>
                  <div class="col-sm-12">
                    <input type="radio"  name="gender" value="male">
                    <label>ذكر</label>
                    <input type="radio"  name="gender" value="female">
                    <label>انثى</label>
                  </div>
                </div>
                <!-- اعدادات بيانات الدخول للموظف -->
                
                <div class="row mb-5">
                    <div class="col-md-4">
                    <label  class=" col-form-label">الرقم الوظيفي </label>
                     <div class="col-sm-10">
                     <input type="number" class="form-control" name="employee_id"  placeholder="الرقم الوظيفي للموظف   " required >
                     </div>
                    </div>

                    <div class="col-md-4">
                     <label  class=" col-form-label">ايميل الموظف</label>
                     <div class="col-sm-10">
                      <input type="email" class="form-control" name="email"  placeholder="   ايميل الموظف للدخول للمنصة" required >
                     </div>
                    </div>

                    <div class="col-md-4">
                     <label  class=" col-form-label"> كلمة المرور الموظف</label>
                     <div class="col-sm-10">
                     <input type="text" class="form-control" name="password"  placeholder="   كلمة السر للدخول للمنصة" required >
                     </div>
                    </div>
                </div>


                
                 <!--   معلومات عامة عن الموظف -->  
                
                 <div class="row mb-5">
                    <div class="col-md-6">
                     <label  class=" col-form-label"> تاريخ الميلاد</label>
                     <div class="col-sm-10">
                      <input type="date" class="form-control" name="age" required>
                     </div>
                    </div>

                    <div class="col-md-6">
                     <label  class=" col-form-label"> تاريخ تعيين الموظف</label>
                     <div class="col-sm-10">
                     <input type="date" class="form-control" name="date_join" required>
                     </div>
                    </div>
                     

               
                </div>
                <div class="row mb-3">
                       <label  class="col-sm-2 col-form-label">صورة الموظف</label>
                       <div class="col-sm-10">
                       <input type="file" class="form-control" name="image">
                       </div>
                </div>
                <div class="row mb-3">
                      <label  class="col-sm-2 col-form-label">رقم الهاتف </label>
                      <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone" placeholder="رقم هاتف الموظف">
                      </div>
                </div>

                
                <?php
                $csrf->input();
                ?>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="اضافة" name="add">
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        
      </div>
    </section>