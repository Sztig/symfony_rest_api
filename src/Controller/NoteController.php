<?php

namespace App\Controller;

use App\Entity\Note;
use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends AbstractFOSRestController
{
    /**
     * @var NoteRepository
     */
    private $noteRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(NoteRepository $noteRepository, EntityManagerInterface $entityManager)
   {

       $this->noteRepository = $noteRepository;
       $this->entityManager = $entityManager;
   }

   public function getNoteAction(Note $note)
   {
       return $this->view($note, Response::HTTP_OK);
   }

    /**
     * @param Note $note
     * @return \FOS\RestBundle\View\View
     */
    public function deleteNoteAction(Note $note)
   {
       if ($note) {
           $this->entityManager->remove($note);
           $this->entityManager->persist();
           return $this->view(null, Response::HTTP_OK);
       }

       return $this->view(['message' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
   }
}
