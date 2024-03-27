
<section class="section">
      <div class="row">
        <div class="mb-3">
            <a href="degree/new" class="btn  btn-success"> <i class="bi bi-plus-lg"></i>منح الشهادة </a>
        </div>
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">سجلات الشهادات الممنوحة للموظفين    </h5>
                  <div class="row mb-3">
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th >اسم الموظف  </th>
                                <th >نوع الشهادة </th>
                                <th >سبب منح الشهادة </th>
                                <th > تاريخ اعطاء الشهادة</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              dbSelect("degree","*");
                              foreach($rows as $row):
                                dbSelect("users", "name", "WHERE id = ? LIMIT 1", [$row['user_id']]);
                                $uName = $rows[0]['name'];
        
                              ?> 
                              <tr>
                                <td ><a href="employees/<?php echo $row['user_id'] ?>/edit"><?php  echo $uName ?></a></td>
                                <td ><?php  echo $row['degree'] ?></td>
                                <td ><?php  echo $row['note']?></td>
                                <td ><?php  echo $row['date']?></td>
                                
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