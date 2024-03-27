
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">سجل دخول وخروج الموظفين الموظفين</h5>
                  <div class="row mb-3">
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th >نوع الاجراء </th>
                                <th >اسم الموظف</th>
                                <th > التاريخ والوقت </th>
                                <th > احداثية الوقت </th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                dbSelect("logs","*");
                                foreach($rows as $row):
                                    dbSelect("admins", "username", "WHERE id = ? LIMIT 1", [$row['admin_id']]);
                                    $uName = $rows[0]['username'];

                                    switch ($row['action']){
                                        case "login":
                                            $action = '<span class="text-success">دخول</span>';
                                            break;
                                        default:
                                            $action = '<span class="text-danger">خروج</span>';
                                            break;
                                    }
                                ?>
                              <tr>
                                <td ><?php  echo $action?></td>
                                <td ><?php  echo $uName ?></td>
                                <td ><?php  echo $row['date']?></td>
                                <td ><?php  echo ago($row['date'], true)?></td>
                                
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