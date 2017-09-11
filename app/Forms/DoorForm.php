<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DoorForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', ['rules' => 'required'])
            ->add('description', 'text', ['rules' => 'required'])
            ->add('submit', 'submit', ['label' => 'save']);
    }
}
