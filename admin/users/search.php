
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">بحث الموظفين</h5>
               <?php 
                if(isset($_POST['submit'])){
                  $csrf->verify();
                  $search=safer($_POST['search']);
                  if(!empty($search)){
                   dbSelect("users","id,name,employee_id,phone","WHERE name LIKE '$search%' OR employee_id LIKE ? OR phone LIKE ? LIMIT 1",[$search,$search]);
                   if($countrows>=1){
                     echo '<div class="row mb-3">';?>
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th >اسم الموظف</th>
                                <th >الرقم الوظيفي </th>
                                <th >رقم الهاتف </th>
                                <th >اجراء </th>
                              </tr>
                            </thead>
                            <tbody>
                    <?php foreach($rows as $row):?>
                      
                     
                              <tr >
                                <td ><?php  echo $row['name']?></td>
                                <td ><?php  echo $row['employee_id']?></td>
                                <td ><?php  echo $row['phone']?></td>
                                <td ><a href="employees/<?php echo $row['id']?>/edit" class="btn btn-warning btn-sm" title="عرض الموظف"><i class="bi bi-eye-fill"></i></a></td>
                              </tr>

                      <?php
                      endforeach;

                       echo '         
                            </tbody>
                        </table>   
                      </div>
                         </div>';
                    }else{
                       sweet("error","فشل","لم يتم العثور على اي موظف  ");
                    }
                 }else{
                    sweet("error","خطأ","لا يمكنك البحث عن شيء فارغ");
                   }
                 }
               ?>
              <form method="post" action="" >
                <div class="row mb-3">
                  <label  class="col-sm-2 col-form-label">اسم الموظف</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="search"  placeholder="ادخل اسم الموظف او الرقم الوظيفي او رقم الهاتف   " required>
                  </div>
                </div>
                <div class="row mb-3">

                <?php
                $csrf->input();
                ?>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="بحث" name="submit">
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>

      </div>
    </section>