<?php

class DefaultController extends CoreController
{
    public function homePage()
    {
        $this->assign([
            'contactJs' => true
        ]);
        $this->renderView('main');
    }

    public function contact()
    {
        if (!empty($_POST['form'])) {
            $error = false;
            $form  = $_POST['form'];
            foreach ($form as $key => $value) {
                $value      = trim($value);
                $form[$key] = $value;
                if (empty($value) && $key !== 'telephone') {
                    $error = true;
                    break;
                }
            }

            if ($error) {
                $this->renderJson([
                    'success' => false,
                    'message' => 'Au moins l\'un des champs du formulaire n\'est pas correctement renseigné'
                ]);
            }

            if (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
                $this->renderJson([
                    'success' => false,
                    'message' => 'Format email invalide'
                ]);
            }

            if (intval($form['captcha']) !== $_SESSION['captcha']) {
                $this->renderJson([
                    'success' => false,
                    'message' => 'Le numéro captcha est erroné'
                ]);
            }

            $this->assign([
                'name'        => $form['name'],
                'addressFrom' => $form['email'],
                'telephone'   => $form['telephone'],
                'message'     => $form['body']
            ]);
            $body = $this->renderHtmlTemplate('mail');
            $res  = MailService::sendMail(EMAIL_ADDRESS_TO, $form['object'], $body);

            if (!$res['success']) {
                $this->renderJson([
                    'success' => false,
                    'message' => $res['message']
                ]);
            }
        }

        $captchaBase64 = CaptchaService::createCaptcha();
        $this->assign([
            'captcha' => $captchaBase64
        ]);

        $this->renderJson([
            'success' => true,
            'message' => !empty($_POST['form']) ? 'Message envoyé avec succès' : '',
            'form'    => $this->renderHtmlTemplate('contact_form')
        ]);
    }

    public function error404()
    {
        $this->renderView('error_404');
    }
}
