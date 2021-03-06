          <!-- your content here -->
          <?php
          include("../../functions/connect.php");
          session_start();
          $out= '';
          $logo = $_SESSION['int_logo'];
          $name = $_SESSION['int_name'];

          $out = '
              <div class="card">
                <div class="card-body">
                  <div style="margin:auto; text-align:center;">
                  <img style = "height: 200px; width: 200px;" src="'.$logo.'" alt="sf">
                  <h2>'.$name.'</h2>
                  <h4>Schedule of Loans Structure and Maturity Profile</h4>
                  <P>From: 24/05/2020  ||  To: 24/05/2020</P>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Schedule of Loans Structure and Maturity Profile</h4>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                    <thead>
                      <th style="font-weight:bold;">TYPE OF DEPOSIT</th>
                      <th style="font-weight:bold; text-align: center;">1- 30 Days <br> &#x20A6</th>
                      <th style="font-weight:bold; text-align: center;">31- 60 Days <br> &#x20A6</th>
                      <th style="text-align: center; font-weight:bold;">61- 90 Days <br> &#x20A6</th>
                      <th style="text-align: center; font-weight:bold;">91- 180 Days <br> &#x20A6 </th>
                      <th style="text-align: center; font-weight:bold;"> 181- 360 Days <br> &#x20A6</th>
                      <th style="text-align: center; font-weight:bold;"> Above 360 Days <br> &#x20A6</th>
                      <th style="text-align: center; font-weight:bold;"> TOTAL <br> &#x20A6</th>
                    </thead>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="font-weight:bold;">MICRO-LOANS</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Number of Account</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Amount (&#x20A6)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="font-weight:bold;">SMALL & MEDUIM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Number of Account</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Amount (&#x20A6)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="font-weight:bold;">HIRE PURCHASE</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Number of Account</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Amount (&#x20A6)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="font-weight:bold;">MICRO-LEASES</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Number of Account</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Amount (&#x20A6)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="font-weight:bold;">OTHER LOANS</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Number of Account</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Amount (&#x20A6)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="font-weight:bold;">STAFF LOANS</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Number of Account</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Amount (&#x20A6)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td style="font-weight:bold; background-color:bisque;">TOTAL</td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                      </tr>
                      <tr>
                        <td style="background-color:bisque;">Number of Account</td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                      </tr>
                      <tr>
                        <td style="background-color:bisque;">Amount (&#x20A6)</td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                        <td style="background-color:bisque;"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--//report ends here -->
              <div class="card">
                 <div class="card-body">
                  <a href="" class="btn btn-primary">Back</a>
                  <a href="" class="btn btn-success btn-left">Print</a>
                 </div>
               </div> 
';
echo $out;
?>