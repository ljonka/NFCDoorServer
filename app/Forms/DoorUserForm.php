<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DoorUserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('chip_uuid', 'text', ['rules' => 'required'])
            ->add('name', 'text', ['rules' => 'required'])
            ->add('phone', 'text', ['rules' => 'required'])
            ->add('email', 'email', ['rules' => 'required'])
            ->add('note', 'textarea', ['rules' => 'required'])
            ->add('submit', 'submit', ['label' => 'save']);
    }
}
