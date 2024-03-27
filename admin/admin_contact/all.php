
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> طلبات مراسلات الموظفين للادارة  </h5>   
                  <div class="row mb-3">
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th >اسم الموظف  </th>
                                <th >الموضوع </th>
                                <th >الاولوية </th>
                                <th > تاريخ المراسلة </th>
                                <th > المشاهدة</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              dbSelect("contact_admin","*");
                              foreach($rows as $row):
                                dbSelect("users", "name", "WHERE id = ? LIMIT 1", [$row['user_id']]);
                                $uName = $rows[0]['name'];
                                switch($row['priority']){
                                  case 2:
                                    $priority = "<b class='taxt-danger'>عاجل</b>";
                                    break;
                                  case 1:
                                    $priority =  "<span class='taxt-warning'>متوسط</span>";
                                  break;
                                  default:
                                    $priority =  "<span class='taxt-success'>عادي</span>";
                                  break;

                                }
        
                              ?> 
                              <tr>
                                <td ><a href="employees/<?php echo $row['user_id'] ?>/edit"><?php  echo $uName ?></a></td>
                                <td ><?php  echo $row['subject'] ?></td>
                                <td ><?php  $priority ?></td>
                                <td ><?php  echo $row['date']?></td>
                                <td><a href="acontact/<?php echo $row['id']?>/view" class="btn btn-warning btn-sm" title="عرض الرسالة"><i class="bi bi-eye-fill"></i></a></td>
                                
                              </tr>
                           <?php endforeach; ?>
                            </tbody>
                        </table>   
                      </div>
                   </div>

            </div>
          </div>
        </div>

      </div>
    </section>