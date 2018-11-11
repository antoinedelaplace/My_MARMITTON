<?php

/**
 * Created by PhpStorm.
 * User: benoit-xavierhouvet
 * Date: 22/02/2016
 * Time: 11:30
 */
include 'PHPMailer-master/PHPMailerAutoload.php';

class mail extends Database
{
    public function add_recipe($add_mail, $id_recipe, $name_recipe)
    {
        $mailer = New PhpMailer();
        $mailer->IsSMTP();
        $mailer->IsHTML(true);
        $mailer->Username = "barmitoniox";
        $mailer->Password = "456-5fu-kzB-hxx";
        $mailer->Host = "smtp.gmail.com";
        $mailer->Port = 465;
        $mailer->SMTPSecure = 'ssl';
        $mailer->SMTPAuth = true;

        $mailer->FromName = "Barmitoniox";
        $mailer->From = "benoitxavierhouvet@gmail.fr";
        $mailer->AddAddress($add_mail);

        $subject = "Validation d'une recette sur le site Barmitoniox";
        $mailer->Subject  = $subject;
        $content = "<html><head><meta http-equiv='Content-Type' content='text/html; charset='UTF-8' />";
        $content .= "Bonjour,<br><br> Votre recette ".$name_recipe." &agrave bien &eacutet&eacute ajout&eacutee sur le site internet.<br><br>";
        $content .= "Vous pouvez la retrouver en cliquant sur ce lien :<br>";
        $content .= "http://localhost:8888/delapl_b/index.php?resume_recipe=1&id=".$id_recipe;
        $content .= "<br><br>A bient&ocirct sur Barmitoniox";
        $content .= "</body>
              </html>";
        $mailer->Body     = $content;
        $mailer->Send();
    }

    public function no_recipe($add_mail, $name_recipe, $id_recipe)
    {
        $mailer = New PhpMailer();
        $mailer->IsSMTP();
        $mailer->IsHTML(true);
        $mailer->Username = "barmitoniox";
        $mailer->Password = "456-5fu-kzB-hxx";
        $mailer->Host = "smtp.gmail.com";
        $mailer->Port = 465;
        $mailer->SMTPSecure = 'ssl';
        $mailer->SMTPAuth = true;

        $mailer->FromName = "Barmitoniox";
        $mailer->From = "benoitxavierhouvet@gmail.fr";
        $mailer->AddAddress($add_mail);

        $subject = "Refus d'une recette sur le site Barmitoniox";
        $mailer->Subject  = $subject;
        $content = "<html><head><meta http-equiv='Content-Type' content='text/html; charset='UTF-8' />";
        $content .= "Bonjour,<br><br> Votre recette ".$name_recipe." &agrave &eacutet&eacute refus&eacutee sur le site internet.<br>";
        $content .= "Celle-ci est similaire &agrave 85% ou plus avec une recette d&eacutej&agrave existante.<br><br>";
        $content .= "La recette similaire &agrave celle que vous avez envoy&eacutee est disponible au line suivant :<br>";
        $content .= "http://localhost:8888/delapl_b/index.php?resume_recipe=1&id=".$id_recipe;
        $content .= "<br><br>A bient&ocirct sur Barmitoniox";
        $content .= "</body>
              </html>";
        $mailer->Body     = $content;
        $mailer->Send();
    }
}