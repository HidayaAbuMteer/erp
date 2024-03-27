
<section class="section">
      <div class="row">
        <div class="mb-3">
            <a href="rewards/new" class="btn  btn-success"> <i class="bi bi-plus-lg"></i>منح حافز   </a>
        </div>
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">سجل حوافز الموظفين</h5>   
                  <div class="row mb-3">
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th >اسم الموظف  </th>
                                <th >الحافز  </th>
                                <th >سبب  الحافز  </th>
                                <th > تاريخ المنح </th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              dbSelect("rewards","*");
                              foreach($rows as $row):
                                dbSelect("users", "name", "WHERE id = ? LIMIT 1", [$row['user_id']]);
                                $uName = $rows[0]['name'];
        
                              ?> 
                              <tr>
                                <td ><a href="employees/<?php echo $row['user_id'] ?>/edit"><?php  echo $uName ?></a></td>
                                <td ><?php  echo $row['title'] ?></td>
                                <td ><?php  echo $row['text']?></td>
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