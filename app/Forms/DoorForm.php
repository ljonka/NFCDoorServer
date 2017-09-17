<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DoorForm extends Form
{
    public function buildForm()
    {
        if(!empty($this->getModel()->name)){
          //'attr' => ['disabled' => true]
          $this->add('name', 'text', ['rules' => 'required','attr' => ['disabled' => true]]);
        }else{
          $this->add('name', 'text', ['rules' => 'required']);
        }

        $this
            ->add('description', 'text', ['rules' => 'required'])
            ->add('submit', 'submit', ['label' => 'save']);
    }
}
