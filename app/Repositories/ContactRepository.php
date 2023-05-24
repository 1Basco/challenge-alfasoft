<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ContactInterface as ContactRepositoryInterface;
use App\Models\Contact;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    /**
     * @return Contact
     */
    public function getAllContacts()
    {
        return $this->model::get();
    }
}