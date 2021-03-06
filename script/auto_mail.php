<?php
include("../functions/connect.php");
require_once "../bat/phpmailer/PHPMailerAutoload.php";
?>
<?php 
$getall = "SELECT * FROM `client` ORDER BY id ASC";
$getmail = mysqli_query($connection, $getall);


while ($res = mysqli_fetch_assoc($getmail)) {
    $usermail = $res["email_address"]; 
    $int_id = $res["int_id"];
    // MAKE ME MOVE
    $query_institution = mysqli_query($connection, "SELECT * FROM `institutions` WHERE int_id = '$int_id'");
    $x = mysqli_fetch_array($query_institution);
    $int_name = $x["int_name"];
    $full_int_name = $x["int_full"];
    $int_address = $x["office_address"];
    $title = $x["pc_title"];
    $name = $x["pc_surname"];
    $position = $x["pc_designation"];
    $img = $x["img"];
    $mail = new PHPMailer;
    // from email addreess and name
    $mail->From = "techsupport@sekanisystems.com.ng";
    $mail->FromName = "$int_name";
    // to adress and name
    $mail->addAddress($usermail, "HAPPY INDEPENDENCE DAY");
    // reply address
    //Address to which recipient will reply
    // progressive html images
   $mail->addReplyTo("techsupport@sekanisystems.com.ng", "Reply");
   // CC and BCC
   //CC and BCC
   // $mail->addCC("cc@example.com");
   // $mail->addBCC("bcc@example.com");
   // Send HTML or Plain Text Email
   $mail->isHTML(true);
   $mail->Subject = "HAPPY INDEPENDENCE DAY";
   $mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
   <html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>
   
   <head>
     <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
     <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
     <meta name='viewport' content='width=device-width'>
     <!--[if !mso]><!-->
     <meta http-equiv='X-UA-Compatible' content='IE=edge'>
     <!--<![endif]-->
     <title></title>
     <!--[if !mso]><!-->
     <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
     <!--<![endif]-->
     <style type='text/css'>
       body {
         margin: 0;
         padding: 0;
       }
   
       table,
       td,
       tr {
         vertical-align: top;
         border-collapse: collapse;
       }
   
       * {
         line-height: inherit;
       }
   
       a[x-apple-data-detectors=true] {
         color: inherit !important;
         text-decoration: none !important;
       }
     </style>
     <style type='text/css' id='media-query'>
       @media (max-width: 690px) {
   
         .block-grid,
         .col {
           min-width: 320px !important;
           max-width: 100% !important;
           display: block !important;
         }
   
         .block-grid {
           width: 100% !important;
         }
   
         .col {
           width: 100% !important;
         }
   
         .col>div {
           margin: 0 auto;
         }
   
         img.fullwidth,
         img.fullwidthOnMobile {
           max-width: 100% !important;
         }
   
         .no-stack .col {
           min-width: 0 !important;
           display: table-cell !important;
         }
   
         .no-stack.two-up .col {
           width: 50% !important;
         }
   
         .no-stack .col.num4 {
           width: 33% !important;
         }
   
         .no-stack .col.num8 {
           width: 66% !important;
         }
   
         .no-stack .col.num4 {
           width: 33% !important;
         }
   
         .no-stack .col.num3 {
           width: 25% !important;
         }
   
         .no-stack .col.num6 {
           width: 50% !important;
         }
   
         .no-stack .col.num9 {
           width: 75% !important;
         }
   
         .video-block {
           max-width: none !important;
         }
   
         .mobile_hide {
           min-height: 0px;
           max-height: 0px;
           max-width: 0px;
           display: none;
           overflow: hidden;
           font-size: 0px;
         }
   
         .desktop_hide {
           display: block !important;
           max-height: none !important;
         }
       }
     </style>
   </head>
   
   <body class='clean-body' style='margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: transparent;'>
     <!--[if IE]><div class='ie-browser'><![endif]-->
     <table class='nl-container' style='table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: transparent; width: 100%;' cellpadding='0' cellspacing='0' role='presentation' width='100%' bgcolor='transparent' valign='top'>
       <tbody>
         <tr style='vertical-align: top;' valign='top'>
           <td style='word-break: break-word; vertical-align: top;' valign='top'>
             <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color:transparent'><![endif]-->
             <div style='background-color:#9e58ad;'>
               <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 670px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;'>
                 <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                   <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#9e58ad;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:670px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                   <!--[if (mso)|(IE)]><td align='center' width='670' style='background-color:transparent;width:670px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                   <div class='col num12' style='min-width: 320px; max-width: 670px; display: table-cell; vertical-align: top; width: 670px;'>
                     <div style='width:100% !important;'>
                       <!--[if (!mso)&(!IE)]><!-->
                       <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                         <!--<![endif]-->
                         <div></div>
                         <!--[if (!mso)&(!IE)]><!-->
                       </div>
                       <!--<![endif]-->
                     </div>
                   </div>
                   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                   <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                 </div>
               </div>
             </div>
             <div style='background-color:transparent;'>
               <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 670px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;'>
                 <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                   <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:670px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                   <!--[if (mso)|(IE)]><td align='center' width='670' style='background-color:transparent;width:670px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                   <div class='col num12' style='min-width: 320px; max-width: 670px; display: table-cell; vertical-align: top; width: 670px;'>
                     <div style='width:100% !important;'>
                       <!--[if (!mso)&(!IE)]><!-->
                       <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                         <!--<![endif]-->
                         <div class='img-container center fixedwidth' align='center' style='padding-right: 0px;padding-left: 0px;'>
                           <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img class='center fixedwidth' align='center' border='0' src='$img' alt='Alternate text' title='Alternate text' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 134px; display: block;' width='134'>
                           <!--[if mso]></td></tr></table><![endif]-->
                         </div>
                         <!--[if (!mso)&(!IE)]><!-->
                       </div>
                       <!--<![endif]-->
                     </div>
                   </div>
                   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                   <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                 </div>
               </div>
             </div>
             <div style='background-color:transparent;'>
               <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 670px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;'>
                 <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                   <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:670px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                   <!--[if (mso)|(IE)]><td align='center' width='670' style='background-color:transparent;width:670px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                   <div class='col num12' style='min-width: 320px; max-width: 670px; display: table-cell; vertical-align: top; width: 670px;'>
                     <div style='width:100% !important;'>
                       <!--[if (!mso)&(!IE)]><!-->
                       <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                         <!--<![endif]-->
                         <div class='img-container center fixedwidth' align='center' style='padding-right: 0px;padding-left: 0px;'>
                           <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px'><td style='padding-right: 0px;padding-left: 0px;' align='center'><![endif]--><img class='center fixedwidth' align='center' border='0' src='https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/584396_565995/Nigeria60.png' alt='Alternate text' title='Alternate text' style='text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 670px; display: block;' width='670'>
                           <!--[if mso]></td></tr></table><![endif]-->
                         </div>
                         <!--[if (!mso)&(!IE)]><!-->
                       </div>
                       <!--<![endif]-->
                     </div>
                   </div>
                   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                   <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                 </div>
               </div>
             </div>
             <div style='background-color:transparent;'>
               <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 670px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;'>
                 <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                   <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:transparent;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:670px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                   <!--[if (mso)|(IE)]><td align='center' width='670' style='background-color:transparent;width:670px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                   <div class='col num12' style='min-width: 320px; max-width: 670px; display: table-cell; vertical-align: top; width: 670px;'>
                     <div style='width:100% !important;'>
                       <!--[if (!mso)&(!IE)]><!-->
                       <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                         <!--<![endif]-->
                         <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                         <div style='color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:1.8;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                           <div style='line-height: 1.8; font-size: 12px; color: #555555; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; mso-line-height-alt: 22px;'>
                             <p style='font-size: 14px; line-height: 1.8; word-break: break-word; mso-line-height-alt: 25px; margin: 0;'><strong><span style='font-size: 20px;'>We have come a long way!</span></strong></p>
                             <p style='font-size: 14px; line-height: 1.8; word-break: break-word; mso-line-height-alt: 25px; margin: 0;'><span style='font-size: 14px;'>On this day, we remember all the grief and sufferings that Nigerians had to endure to achieve the long-awaited freedom, independence, and sovereignty of our country. We congratulate all the inhabitants of this beautiful country - Nigeria. May joy, love, smile, luck and peace continue to thrive in our homeland.&nbsp;</span></p>
                           </div>
                         </div>
                         <!--[if mso]></td></tr></table><![endif]-->
                         <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                         <div style='color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                           <div style='line-height: 1.5; font-size: 12px; color: #555555; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; mso-line-height-alt: 18px;'>
                             <p style='line-height: 1.5; word-break: break-word; text-align: center; font-size: 20px; mso-line-height-alt: 30px; margin: 0;'><span style='font-size: 20px;'>Thank you for choosing <strong>$full_int_name</strong></span></p>
                           </div>
                         </div>
                         <!--[if mso]></td></tr></table><![endif]-->
                         <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                         <div style='color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                           <div style='line-height: 1.5; font-size: 12px; color: #555555; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; mso-line-height-alt: 18px;'>
                             <p style='line-height: 1.5; word-break: break-word; text-align: left; font-size: 20px; mso-line-height-alt: 30px; margin: 0;'><span style='font-size: 20px;'>Regards</span></p>
                             <p style='line-height: 1.5; word-break: break-word; text-align: left; font-size: 20px; mso-line-height-alt: 30px; margin: 0;'><span style='font-size: 20px;'>$title $name, $position</span></p>
                           </div>
                         </div>
                         <!--[if mso]></td></tr></table><![endif]-->
                         <!--[if (!mso)&(!IE)]><!-->
                       </div>
                       <!--<![endif]-->
                     </div>
                   </div>
                   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                   <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                 </div>
               </div>
             </div>
             <div style='background-color:#9e58ad;'>
               <div class='block-grid ' style='Margin: 0 auto; min-width: 320px; max-width: 670px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;'>
                 <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
                   <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0' style='background-color:#9e58ad;'><tr><td align='center'><table cellpadding='0' cellspacing='0' border='0' style='width:670px'><tr class='layout-full-width' style='background-color:transparent'><![endif]-->
                   <!--[if (mso)|(IE)]><td align='center' width='670' style='background-color:transparent;width:670px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;'><![endif]-->
                   <div class='col num12' style='min-width: 320px; max-width: 670px; display: table-cell; vertical-align: top; width: 670px;'>
                     <div style='width:100% !important;'>
                       <!--[if (!mso)&(!IE)]><!-->
                       <div style='border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'>
                         <!--<![endif]-->
                         <!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif'><![endif]-->
                         <div style='color:#f9f9f9;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;'>
                           <div style='line-height: 1.2; font-size: 12px; color: #f9f9f9; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;'>
                             <p style='text-align: center; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;'><em>All rights reserved&nbsp; $full_int_name Copyright@ 2020&nbsp;</em></p>
                             <p style='text-align: center; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;'><em>You are receiving this email because you are a Microfinance Institutions(MFI) under Sekani Systems</em></p>
                           </div>
                         </div>
                         <!--[if mso]></td></tr></table><![endif]-->
                         <!--[if (!mso)&(!IE)]><!-->
                       </div>
                       <!--<![endif]-->
                     </div>
                   </div>
                   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                   <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                 </div>
               </div>
             </div>
             <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
           </td>
         </tr>
       </tbody>
     </table>
     <!--[if (IE)]></div><![endif]-->
   </body>
   
   </html>";
   $mail->AltBody = "This is the plain text version of the email content";
   // mail system
   if(!$mail->send()) 
   {
     echo "Mailer Error: " . $mail->ErrorInfo;
   } else
   {
    echo $xm = "<h1>EMAIL SENT</h1>";
   }
} 
?>