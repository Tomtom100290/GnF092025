<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\MessagerieMail;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MessagerieMailController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $contact = new MessagerieMail();
        $form = $this->createForm(ContactType::class, $contact);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Créer l'email
            $email = (new Email())
                ->from($contact->getEmail())
                ->to('admin@monsite.com')
                ->subject('Contact: ' . $contact->getObjet())
                ->html(
                    '<h2>Nouveau message de contact</h2>' .
                    '<p><strong>Nom :</strong> ' . htmlspecialchars($contact->getNom()) . '</p>' .
                    '<p><strong>Prénom :</strong> ' . htmlspecialchars($contact->getPrenom()) . '</p>' .
                    '<p><strong>Email :</strong> ' . htmlspecialchars($contact->getEmail()) . '</p>' .
                    '<p><strong>Objet :</strong> ' . htmlspecialchars($contact->getObjet()) . '</p>' .
                    '<p><strong>Message :</strong></p>' .
                    '<p>' . nl2br(htmlspecialchars($contact->getMessage())) . '</p>'
                );
            
            try {
                $mailer->send($email);
                
                // Message de succès et redirection vers /home
                $this->addFlash('success', 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
                
                return $this->redirectToRoute('app_home');
                
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.');
            }
        }
        
        return $this->render('MessagerieMail/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}