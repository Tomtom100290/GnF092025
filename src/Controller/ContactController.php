<?php

namespace App\Controller;

use App\DTO\contactDTO;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController


//----------------Lien de téléchargement Mailpit---------------\\
//---https://github.com/axllent/mailpit/releases/tag/v1.27.10---\\


{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer):Response
    {
            $data = new contactDTO();

            // TODO : Supprimer ça
            $data->name = 'john Doe';
            $data->email = 'john';
            $data->message = 'super site';
            $form = $this->createForm(ContactType::class, $data);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // Envoi de l'email
                $mail =(new TemplatedEmail())
                ->to('contact@demo.fr')
                ->from($data->email)
                ->subject('Demande de contac')
                ->htmlTemplate('mail/contact.html.twig')
                ->context(['data' => $data]);
                $mailer->send($mail);
                $this->addFlash('');
            }
        return $this->render('contact/contact.html.twig', [
            'form' => $form,
        ]);
    }
}
