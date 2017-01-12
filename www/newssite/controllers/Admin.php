<?php

namespace Application\Controllers;

use Application\Models\News as NewsModel;
use Application\Classes\Session;
use Application\Classes\Logging;
use Application\Classes\View;
use PHPMailer\PHPMailer\PHPMailer;

class Admin extends \AbstractController
{
    public function actionAddNews ()
    {
        $inspect = Admin::inspect_post($_POST['title'], $_POST['descript'], $_POST['date']);

        if(false !== $inspect){

            $add = new NewsModel();
            $add->data = [
                'title' => $_POST['title'],
                'descript' => $_POST['descript'],
                'date' => $_POST['date']];

            if(false !== $add->insert()){
                $_SESSION['error'] = 'Новость успешно добавлена!';
                header('Location: /newssite/index.php?ctrl=Admin&act=AddNews');
                exit;
            } else {
                $_SESSION['error'] = 'Возникли ошибки!';
                header('Location: /newssite/index.php?ctrl=Admin&act=AddNews');
                exit;
            }
        }
        Session::error_check();
        Admin::view_AddNews_form();
    }
    public static function view_AddNews_form()
    {
        $template = '/news/form_add.php';
        $view = new View($template);
        $view->display($template);
    }
    public static function inspect_post ($title, $descript, $date)
    {
        if(!empty($title) && !empty($descript) && !empty($date)){
            return true;
        }
        return false;
    }
    public function actionUpdate()
    {
        if(!empty($_POST['title']) && !empty($_POST['descript'])){

                $upd = new NewsModel();
                $upd->id = $_GET['id'];
                $upd->data=['title' => $_POST['title'],
                            'descript' => $_POST['descript']];
                //var_dump($upd->data); die;

                if(false !== $upd->update()){
                    $_SESSION['error'] = 'Новость успешно обновлена!';
                    header('Location: /newssite/index.php?ctrl=News&act=One&id=' . $upd->id);
                    exit;
                } else {
                    $_SESSION['error'] = 'Возникли ошибки!';
                    header('Location: /newssite/index.php?ctrl=Admin&act=Update');
                    exit;
                }
        }
        Session::error_check();
        $template = 'news/update_form.php';
        $view = new View();
        $view->display($template);

    }
    public function actionDelete ()
    {
        $del = new NewsModel();
        $del->id = $_GET['id'];
        $del->delete();
        $_SESSION['error'] ='Новость успешно удалена!';
        header('Location: /newssite/index.php');
        exit;
    }
    public function actionCheckLogFile()
    {
        $log = new Logging();
        $data = explode(';',$log->read());
        Admin::give_to_view($data, './error_log.php');
    }
    public function actionSendMail()
    {
        $mail =  new PHPMailer();
        //$mail->isSMTP();

        //$mail->Host = 'test.local';
        //$mail->SMTPAuth = true;                               // Enable SMTP authentication
        //$mail->Username = 'lirik-vagabund@yandex.ru';                 // SMTP username
        //$mail->Password = 't,fnmtujdhjn';                           // SMTP password
        //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        //$mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('lirik-vagabund@yandex.ru');
        $mail->addAddress('vanyalirik@yandex.ru');     // Add a recipient
        //$mail->addReplyTo('vanyalirik@yandex.ru', 'Information');
        $mail->addCC('vanyalirik@yandex.ru');
       // $mail->addBCC('bcc@example.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        //$mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }



    }
}